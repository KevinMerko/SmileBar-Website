<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        function ConfirmPost() {
            return confirm("Are you sure you want to post this review?");
        }

        function ConfirmDelete() {
            return confirm("Are you sure you want to delete this review?");
        }
    </script>

</head>

<body>

    <?php
    include_once('adminnavbar.php');
    include('db.php');

    $result = mysqli_query($conn, "SELECT * FROM reviews");

    echo "<p> View All | <a href='view-paginated.php?page=1'>View with pages</a></p> </p>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr> <th>ID</th> <th>Username</th> <th>Review</th> <th>Created</th> <th>Post</th> <th>Delete</th> </tr>";
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $username = $row['username'];
        $review = $row['review'];
        $create_datetime = $row['create_datetime'];
        $post = $row['post'];
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$username</td>";
        echo "<td>$review</td>";
        echo "<td>$create_datetime</td>";
    ?>

        <td>
            <form name='Post' action='postreview.php?id=' <?php echo $row['id']; ?>' method='post' />
            <input type="submit" value='Post' Onclick="return ConfirmPost()" />
            </form>
        </td>
        <td>
            <form name='Delete' action='deletereview.php?id=<?php echo $row['id']; ?> ' method='post' />
            <input type="submit" value="Delete" Onclick="return ConfirmDelete()" />
            </form>
        </td>
    <?php

        echo "</tr>";
    }
