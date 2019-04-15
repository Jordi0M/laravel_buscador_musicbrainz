<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>bbdd</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
</head>
<body>

    <div id="boton">
        <h1>Para ir al buscador:</h1>
        <form action="/musicbrainz">
            <input type="submit" value="Musicbrainz buscador">
        </form>
    </div>

    <br>

    <div id="div_info">

    </div>

    <br>

    <div id="div_info2">

    </div>

    @if ( isset($artist) ) 
    
        <script>
            document.addEventListener('DOMContentLoaded', function(){
            
                var prueba = {!! $artist !!};
                var tabla =  $("<table border='1'>");
                var tr_nombre = $("<tr>");
                var tr_pais = $("<tr>");
                var tr_tipo = $("<tr>");
                var fecha_inicio = $("<tr>");
                var fecha_fin = $("<tr>");
                
                $(tr_nombre).append("<th>Nombre</th>");
                $(tr_pais).append("<th>Pais</th>");
                $(tr_tipo).append("<th>Tipo</th>");
                $(fecha_inicio).append("<th>Fecha inicio</th>");
                $(fecha_fin).append("<th>Fecha fin</th>");

                for (const key in prueba) {
                    $(tr_nombre).append( $("<td>").text(prueba[key]["name"]));
                    $(tr_pais).append( $("<td>").text(prueba[key]["country"]));
                    $(tr_tipo).append( $("<td>").text(prueba[key]["type"]));
                    $(fecha_inicio).append( $("<td>").text(prueba[key]["begin"]));
                    $(fecha_fin).append( $("<td>").text(prueba[key]["ended"]));
                };
                $(tabla).append(tr_nombre);
                $(tabla).append(tr_pais);
                $(tabla).append(tr_tipo);
                $(tabla).append(fecha_inicio);
                $(tabla).append(fecha_fin);
                
                $("#div_info").append("<h1>Queen, De la base de datos</h1>");
                $("#div_info").append(tabla);
                
            });
        </script>    

    @else    
        <h1>Tienes la base de datos vaica</h1>

    @endif    

    @if ( isset($recording) )

        <script>

            document.addEventListener('DOMContentLoaded', function(){
                
                var prueba = {!! $recording !!};
                var tabla =  $("<table border='1'>");
                var tr_nombre = $("<tr>");
                var tr_status = $("<tr>");
                var tr_country = $("<tr>");
                var date = $("<tr>");
                var album = $("<tr>");
                
                $(tr_nombre).append("<th>Nombre</th>");
                $(tr_status).append("<th>Estado</th>");
                $(tr_country).append("<th>Pais</th>");
                $(date).append("<th>Fecha</th>");
                $(album).append("<th>Album</th>");

                for (const key in prueba) {
                    $(tr_nombre).append( $("<td>").text(prueba[key]["title"]));
                    $(tr_status).append( $("<td>").text(prueba[key]["status"]));
                    $(tr_country).append( $("<td>").text(prueba[key]["country"]));
                    $(date).append( $("<td>").text(prueba[key]["date"]));
                    $(album).append( $("<td>").text(prueba[key]["album"]));
                };
                $(tabla).append(tr_nombre);
                $(tabla).append(tr_status);
                $(tabla).append(tr_country);
                $(tabla).append(date);
                $(tabla).append(album);

                $("#div_info2").append("<h1>Avenged, De la base de datos<h1>");
                $("#div_info2").append(tabla);
                
            });

        </script>

    @else   

    <h1>Tienes la base de datos vaica</h1>

    @endif


    
</body>
</html>