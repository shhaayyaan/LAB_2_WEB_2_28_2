<!DOCTYPE html>
<html>

<head>
    <title>Jquery AJAX, PHP and MySQL </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var page_number = 1;
            $(window).scroll(function() {
                if ($(document).height() - $(this).height() == Math.floor($(this).scrollTop())) {
                    page_number += 1;
                    $.ajax({
                        type: "GET",
                        url: "ajaxpagination.php?page=" + page_number,
                        success: function(msg) {
                            if (msg) {
                                $("#content_container").append(msg);
                            }
                        },
                        error: function(req, status, error) {
                            alert("Error try again");
                        }
                    });

                    console.log('Scrolled to Bottom ' + page_number.toString());
                }
            })
            $("#content_container").load("ajaxpagination.php?page=" + page_number.toString(), hideLoading());

            function hideLoading() {
                $("#loading").fadeOut("slow");
            }

            $("#paginate li:first")
                .css({
                    color: "#FF0084",
                })
                .css({
                    border: "none",
                });
            $("#paginate li").click(function() {
                $("#paginate li")
                    .css({
                        border: "solid #dddddd 1px",
                    })
                    .css({
                        color: "#0063DC",
                    });
                $(this)
                    .css({
                        color: "#FF0084",
                    })
                    .css({
                        border: "none",
                    });
                var page_num = this.id;
                $("#content_container").load(
                    "ajaxpagination.php?page=" + page_num,
                    hideLoading()
                );
            });
        });
    </script>

    <style>
        .pagination {
            float: left;
            width: 100%;
        }

        .botoom_link {
            float: left;
            width: 100%;
        }

        .content {
            float: left;
            width: 100%;
        }

        ul {
            list-style: none;
            float: left;
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
            float: left;
            margin-right: 16px;
            padding: 5px;
            border: solid 1px #dddddd;
            color: #0063DC;
        }

        li:hover {
            color: #FF0084;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <div style="width:85%;">
        <h2>Pagination with Jquery AJAX, MySQL and PHP </h2>
    </div>


    <?php

    include("databaseConnect.php");

    $per_page = 20;
    // $sql = "SELECT * FROM tasks";
    // my own database
    $sql = "SELECT * FROM tbl_tasks";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $pages = ceil($count / $per_page)
    ?>
    <table width="100%" id="content_container">
        <thead>
            <tr>
                <th> Id</th>
                <th>Task Name</th>
            </tr>
        </thead>

    </table>

    <div id="loading"><img src="images/loading.webp" /></div>
</body>


</html>