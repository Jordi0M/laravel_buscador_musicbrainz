<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <form action="/">
        <label for="">Busca</label>
        <input type="text" name="buscador">
        <button>Busca</button>
    </form>

    <div id="div_info">

    </div>

    @if ( isset($res)) 
    
        <script>
            document.addEventListener('DOMContentLoaded', function(){
            
                var prueba = {!! $res !!}["artists"];
                var tabla =  $("<table border='1'>");
                var tr_nombre = $("<tr>");
                $(tr_nombre).append("<th>Nombre</th>")
                for (const key in prueba) {
                    $(tr_nombre).append( $("<td>").text(prueba[key]["name"]));
                };
                $(tabla).append(tr_nombre);
                $("#div_info").append(tabla);
                
            });
        </script>
        
    @endif    

</body>    
</html>

