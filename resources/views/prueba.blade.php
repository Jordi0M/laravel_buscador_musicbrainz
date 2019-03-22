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

    {{var_dump($res)}}

    <script>
		document.addEventListener('DOMContentLoaded', function(){
            var prueba = {!! $res !!};
            console.log(prueba);
        });
        //var algo = {/*!! json_encode($res->toArray(), JSON_HEX_TAG) !!};
        
    </script>

</body>    
</html>

