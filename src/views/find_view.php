<!DOCTYPE html>
<html>

<head>
    <title>Wyszukiwarka</title>
    <?php include "includes/head.inc.php"; ?>
</head>

<body>
    <?php dispatch($routing, '/menu') ?>

    <br><br><br>
    <form action="find_submit" method="post" class="wide" data-role="find_form" id="find">
        <input class="form-input" type="text" name="name" value="" autocomplete="off" onkeyup="show_images()" />
    </form>

    <div id="images">
        <?php dispatch($routing, '/find_result') ?>
    </div>

    <script>
        function show_images() {
            $this = $('form[data-role=find_form]');
            $('#images').html('');
            $.post($this.attr('action'), $this.serialize(), function (response) {
                $('#images').html(response);
            });
        }
    </script>


    <?php include "includes/footer.inc.php"; ?>

</body>

</html>