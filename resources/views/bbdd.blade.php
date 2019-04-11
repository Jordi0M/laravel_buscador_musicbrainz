<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>bbdd</title>
</head>
<body>


    @if ( isset($res)) 
    
        <script>
            document.addEventListener('DOMContentLoaded', function(){
            
                var prueba = {!! $res !!}["artists"];
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
                    $(fecha_inicio).append( $("<td>").text(prueba[key]["life-span"]["begin"]));
                    $(fecha_fin).append( $("<td>").text(prueba[key]["life-span"]["ended"]));
                };
                $(tabla).append(tr_nombre);
                $(tabla).append(tr_pais);
                $(tabla).append(tr_tipo);
                $(tabla).append(fecha_inicio);
                $(tabla).append(fecha_fin);
                
                $("#div_info").append("<h1>De la base de datos</h1>");
                $("#div_info").append(tabla);
                
            });
        </script>
    @endif    

    
</body>
</html>