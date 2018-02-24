<html>
    <head>
        <title>Testing QR code</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript">
            function generateBarCode()
            {
                var nric = $('#text').val();
                var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + nric + '&amp;size=50x50';
                $('#barcode').attr('src', url);
            }
        </script>
    </head>
    <body>
      <img id='barcode'
            src="https://api.qrserver.com/v1/create-qr-code/?data=localhost/~osos04/es/index&amp;size=100x100"
            alt=""
            title="HELLO"
            width="100"
            height="100" />
    </body>
</html>
