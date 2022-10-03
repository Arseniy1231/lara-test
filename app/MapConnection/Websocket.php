<?php
namespace App\MapConnection;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Illuminate\Support\Facades\DB;

class Websocket implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        $SendMarkers = DB::select('select * from maps');
        $SendMarkers = json_encode( $SendMarkers);
        $conn->send($SendMarkers);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $JsonArray = json_decode($msg,true);
        $key = "data";
        $key2= "type";
        if($JsonArray[$key2] == "MarkerDel"){
            $result = $JsonArray[$key];
            DB::delete('delete from maps where latitude_longitude = ?',[$result]);
        }else{
            $result = $JsonArray[$key];
            DB::table('maps')->insert([
                'latitude_longitude' => $result,          
            ]);
           
            foreach ($this->clients as $client) {
                // if ($from !== $client) {
                    // The sender is not the receiver, send to each client connected
                    $client->send($msg);
                // }
            }

        }
       
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}