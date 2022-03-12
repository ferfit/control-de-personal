<script>
    $('#formulario').submit(function(e) {

        e.preventDefault();

        $('#btnForm').prop('disabled','true');

        this.submit();


    });

</script>
