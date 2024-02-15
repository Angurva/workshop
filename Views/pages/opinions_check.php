<?php
/*
require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_head.php');

require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_header.php');*/

 if(isset($_SESSION['id']) && ($_SESSION['role']== 1 || $_SESSION['role']== 2 || $_SESSION['role']== 3))
 {
?>  
<main class="container">
    <article>
        <table class="table table-light table-striped text-center mt-5 table-bordered border">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Surnom</th>
                <th scope="col">Note</th>
                <th scope="col">Description</th>
                <th scope="col" class="">Status</th>
                <th scope="col" colspan="2">Validation</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($op_pending as $pending):
                ?>
               
                <tr>
                    <th scope="row"> <?php echo $pending['op_id'] ?></th>
                    <td><?php echo $pending['op_surname'] ?></td>
                    <td><?php echo $pending['op_note'] ?></td>
                    <td><?php echo $pending['op_comments'] ?></td>
                    <td><?php echo $pending['op_status'] ?></td>
                    <td><form action="/opinions/accept" method="POST"><input type="hidden" name="op_id" value=<?php echo $pending['op_id']?> > <button type="submit" class="btn btn-outline-success ms-auto">Accept</button></form></td>
                    <td><form action="/opinions/reject" method="POST"><input type="hidden" name="op_id" value=<?php echo $pending['op_id']?> > <button type="submit" class="btn btn-outline-danger me-auto">Reject</button></form></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </article>
</main>

<?php
 }
//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_footer.php');
?>