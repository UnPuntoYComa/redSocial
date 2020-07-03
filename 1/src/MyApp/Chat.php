<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;
    private $id;
    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->id = array();
        $this->s = new \SplObjectStorage;
	    echo "server started";
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        $querystring=$conn->WebSocket->request->getQuery();
        $this->id[]=$querystring;
         echo $querystring;
    	foreach ($this->clients as $client) {
            if ($conn !== $client) {
                // The sender is not the receiver, send to each client connected
                echo " ". $conn->resourceId."\n";
                $client->send('{"command":"agregar","data":"'.$querystring.'"}');
                
            }else{
                $datos =implode(",",$this->id);
                $client->send('{"command":"actualizar","data":"'.$datos.'"}');
            }
	
        echo "New connection! ({$conn->resourceId})\n";
    	}
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->s = $this->clients;
        $this->s->rewind();
        print_r($this->id) ;
        while($this->s->valid()) {
            $index  = $this->s->key();
            echo $index;
            echo $this->id[$index]." AAAAAAA " ;
            if($this->s->current()===$conn){
                $nuevoArreglo = array_diff($this->id, array($this->id[$index]));
                $nuevoArreglo = array_values($nuevoArreglo);
                $this->id = $nuevoArreglo;

            break;
            }
            $this->s->next();
        }
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
         print_r($this->id) ;
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
