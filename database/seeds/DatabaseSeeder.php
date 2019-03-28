<?php

use Illuminate\Database\Seeder;
use App\artista;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $url = "http://musicbrainz.org/ws/2/artist?query=queen";
        $c = curl_init( $url );
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json','User-Agent:Laravel/5.7'));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($c);

        $dades = json_decode($res,true);
        
        foreach ($dades as $key => $value) {

            if ($key == "artists") {
                foreach ($value as $key2 => $value2) {

                    $p = new artista;

                    if ( isset($value2["name"]) ) {
                        $p->name = $value2['name'];
                        $this->command->info(var_dump($value2["name"]));
                    }

                    if ( isset($value2["country"]) ) {
                        $p->country = $value2['country'];
                        $this->command->info(var_dump($value2["country"]));
                    }

                    if ( isset($value2["type"]) ) {
                        $p->type = $value2['type'];
                        $this->command->info(var_dump($value2["type"]));
                    }

                    if ( isset($value2["life-span"]["begin"]) ) {
                        $p->begin = $value2["life-span"]['begin'];
                        $this->command->info(var_dump($value2["life-span"]["begin"]));
                    }

                    if ( isset($value2["life-span"]["end"]) ) {
                        $p->ended = $value2["life-span"]['end'];
                        $this->command->info(var_dump($value2["life-span"]["end"]));
                    }
                    $p->save();
                }
                
            }

        }

    }

}
