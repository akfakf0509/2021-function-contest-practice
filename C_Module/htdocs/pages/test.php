<script>
    $("html").ready(function() {
        $.ajax({
            type: "POST",
            url: "openAPI/showList.php",
            data: "&searchType=M&year=2021&month=5",
            dataType: "json",
            cache: false,
            async: false,
            success: function (response) {
                console.log(response);
            }
        });
    })
</script>