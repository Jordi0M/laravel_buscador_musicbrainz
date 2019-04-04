<?php

use Illuminate\Database\Seeder;
use App\artist;
use App\recording;


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

                    $p = new artist;

                    if ( isset($value2["name"]) ) {
                        $p->name = $value2['name'];
                        $this->command->info(var_dump($value2["name"]));
                    }
                    else{
                        $p->name = "";
                    }

                    if ( isset($value2["country"]) ) {
                        $p->country = $value2['country'];
                        $this->command->info(var_dump($value2["country"]));
                    }
                    else{
                        $p->country = "";
                    }

                    if ( isset($value2["type"]) ) {
                        $p->type = $value2['type'];
                        $this->command->info(var_dump($value2["type"]));
                    }
                    else{
                        $p->type = "";
                    }

                    if ( isset($value2["life-span"]["begin"]) ) {
                        $p->begin = $value2["life-span"]['begin'];
                        $this->command->info(var_dump($value2["life-span"]["begin"]));
                    }
                    else{
                        $p->begin = "";
                    }

                    if ( isset($value2["life-span"]["end"]) ) {
                        $p->ended = $value2["life-span"]['end'];
                        $this->command->info(var_dump($value2["life-span"]["end"]));
                    }
                    else{
                        $p->ended = "";
                    }
                    $p->save();
                }
                
            }

        }

        $url = "http://musicbrainz.org/ws/2/recording?query=Ruben";
        $c = curl_init( $url );
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json','User-Agent:Laravel/5.7'));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($c);

        $dades = json_decode($res,true);
        
        foreach ($dades as $key => $value) {

            if ($key == "recordings") {
                foreach ($value as $key2 => $value2) {

                    $p = new recording;

                    if ( isset($value2["title"]) ) {
                        $p->title = $value2['title'];
                        $this->command->info(var_dump($value2["title"]));
                    }
                    else{
                        $p->title = "";
                    }

                    if ( isset($value2["length"]) ) {
                        $p->length = $value2['length'];
                        $this->command->info(var_dump($value2["length"]));
                    }
                    else{
                        $p->length = "";
                    }

                    if ( isset($value2["releases"][0]["title"]) ) {
                        $p->disc = $value2["releases"][0]["title"];
                        $this->command->info(var_dump($value2["releases"][0]["title"]));
                    }
                    else{
                        $p->disc = "";
                    }
                    $p->save();
                }
                
            }

        }

    }

}
