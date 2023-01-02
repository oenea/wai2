<!DOCTYPE html>
<html>

<head>
    <title>Wyszukiwarka</title>
    <?php include "includes/head.inc.php"; ?>
</head>

<body>
    <?php dispatch($routing, '/menu') ?>

    <!--<form action="find_submit" method="post" class="wide" data-role="find_form" id="find">-->
    <form action="" id="search">
        <input type="text" name="name" value="" onkeyup="show_gallery(this.value)" />
        <div>
            <a href="gallery" class="cancel">&laquo; Wróć</a>
            <input type="submit" name="submit" value="Znajdź" />
        </div>
    </form>

    <div id="images">
        <?php dispatch($routing, '/find_result') ?>
    </div>

    <script>
        function show_gallery(str) {
            if(str > 0){
                document.getElementById("")
            }
        }
        /*$(function () {
            $('form[data-role=find_form]').unbind('submit').submit(function (e) {
                e.preventDefault();
                $('#images').html('');
                $.post($(this).attr('action'), $(this).serialize(),
                    function (response) {
                        $('#images').html(response);
                    });
            });
        });
        */
    </script>


    <?php include "includes/footer.inc.php"; ?>

</body>

</html>