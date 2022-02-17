<?php
require 'admin/connect.php';

$record_per_page = 3;
$page = '';
$id = $_POST['id'];
$output = '';

if (isset($_POST['page']) && isset($_POST['id'])) {
    $page = $_POST['page'];
    $id = $_POST['id'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $record_per_page;
$sql = "select * from comment_product
join customer on comment_product.customer_id = customer.id
where product_id = '$id'
limit $record_per_page offset $start_from";
$result = mysqli_query($connect, $sql);
foreach ($result as $each) {
    $checked_1 = '';
    $checked_2 = '';
    $checked_3 = '';
    $checked_4 = '';
    $checked_5 = '';
    switch ($each['star']) {
        case '1':
            $checked_1 = 'checked';
            break;
        case '2':
            $checked_2 = 'checked';
            break;
        case '3':
            $checked_3 = 'checked';
            break;
        case '4':
            $checked_4 = 'checked';
            break;
        case '5':
            $checked_5 = 'checked';
            break;
        default:
            break;
    }
    $name_user = $each['name'];
    $id_comment = $each['id'];
    $time_user = $each['time'];
    $content_comment = $each['content'];
    $output .= "
                <div style='display: flex; align-items: center;'>
										<p class='name'>" . $name_user . "</p>

										<p class='star'>
											<span class='star-cb-group'>
												<input " . $checked_5 . " type='radio' id='rating-" . $id_comment . "-5' name='rating-" . $id_comment . "' value='5' disabled /><label for='rating-5' style='font-size: 15px;'>5</label>
												<input " . $checked_4 . " type='radio' id='rating-" . $id_comment . "-4' name='rating-" . $id_comment . "' value='4' disabled /><label for='rating-4' style='font-size: 15px;'>4</label>
												<input " . $checked_3 . " type='radio' id='rating-" . $id_comment . "-3' name='rating-" . $id_comment . "' value='3' disabled /><label for='rating-3' style='font-size: 15px;'>3</label>
												<input " . $checked_2 . " type='radio' id='rating-" . $id_comment . "-2' name='rating-" . $id_comment . "' value='2' disabled /><label for='rating-2' style='font-size: 15px;'>2</label>
												<input " . $checked_1 . " type='radio' id='rating-" . $id_comment . "-1' name='rating-" . $id_comment . "' value='1' disabled /><label for='rating-1' style='font-size: 15px;'>1</label>
											</span>
										</p>
										<p class='date'><?php echo date_format(new DateTime(" . '$id_comment' . "), 'd/m/Y') ?></p>
									</div>
									<p class='comment'>" . $content_comment . "</p>
                                    ";
}

$sql = "SELECT * FROM comment_product where product_id = '$id' ORDER BY time DESC";
$page_result = mysqli_query($connect, $sql);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);
$output .= "<div style='    padding: 10px 10px 0 0;text-align: end;
}'>";
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i === ($start_from + 1)) {
        $output .= "<span class='pagination_link' style='cursor:pointer;margin-left:5px; padding:3px; border:1px solid #ccc;color:#e63946;' id='" . $i . "'>" . $i . "</span>";
    } else {
        $output .= "<span class='pagination_link' style='cursor:pointer;margin-left:5px; padding:3px; border:1px solid #ccc;' id='" . $i . "'>" . $i . "</span>";
    }
}
$output .= "</div>";
echo $output;
