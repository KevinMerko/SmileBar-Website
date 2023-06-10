<!DOCTYPE html>
<html lang="en">
    <head>

    </head>

    <body>

    //view paginated 
    <?php
    include_once('adminnavbar.php');
    include('db.php');
    $per_page = 5;
    $result = mysqli_query($conn, "SELECT * FROM reviews");
    $total_results = mysqli_num_rows($result);
    $total_pages = ceil($total_results / $per_page);

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $show_page = $_GET['page'];
        // Make sure the $show_page value is valid
        if ($show_page > 0 && $show_page <= $total_pages) {
            $start = ($show_page - 1) * $per_page;
            $end = $start + $per_page;
        } else {
            // error - show first set of results
            $start = 0;
            $end = $per_page;
        }
    } else {
        // if page isn't set, show first set of results
        $start = 0;
        $end = $per_page;
    }

    // Display the results in table
    echo "<p>View All | <b>View with pages</b> </p>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr> <th>ID</th> <th>Username</th> <th>Review</th> <th>Created</th> <th>Post</th> <th>Delete</th> </tr>";

    // loop through results of database query, displaying them in the table

    while ($row = mysqli_fetch_array($result)) {
        // echo out the contents of each row into a table
        echo "<tr>";
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['review'] . '</td>';
        echo '<td>' . $row['create_datetime'] . '</td>';
        echo '<td><a href="viewpost.php?id=' . $row['post_id'] . '">View Post</a></td>';
        echo '<td><a href="deletereview.php?id=' . $row['id'] . '">Delete</a></td>';
        echo "</tr>";
    }

    // close table>
echo "</table>";
// pagination
echo "<p><a href='viewreviews.php?page=1'>First</a> ";
if ($show_page > 1) {
    $prev = $show_page - 1;
    echo "<a href='viewreviews.php?page=$prev'>Prev</a> ";
}
if ($show_page < $total_pages) {
    $next = $show_page + 1;
    echo "<a href='viewreviews.php?page=$next'>Next</a> ";
}
echo "<a href='viewreviews.php?page=$total_pages'>Last</a></p>";
?>



   