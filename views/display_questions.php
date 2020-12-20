<?php include('abstract-views/header.php'); ?>
    <h1>Display Questions Form<br></h1>

<table border="2" class="table table-hover table-sm">
    <thead class="thead-dark">
    <tr class ="table-dark text-dark">
        <th>ID</th>
        <th>Owner Email</th>
        <th>Owner ID</th>
        <th>Date Created</th>
        <th>Title</th>
        <th>Body</th>
        <th>Skills</th>
        <th>Score</th>
        <th>Action</th>
    </tr>
    </thead>
    <?php foreach ($questions as $question) : ?>
        <tr class="table-success">
            <td><?php echo $question['id']?></td>
            <td><?php echo $question['owneremail']?></td>
            <td><?php echo $question['ownerid']?></td>
            <td><?php echo $question['createddate']?></td>
            <td><?php echo $question['title']?></td>
            <td><?php echo $question['body']?></td>
            <td><?php echo $question['skills']?></td>
            <td><?php echo $question['score']?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_question">
                    <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">
                    <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

    <a href=".?action=display_question_form&userId=<?php echo $userId; ?>"class="btn btn-info" role="button">Add Question</a>
    <a href=".?action=display_questions&userId=<?php echo $userId; ?>&listType=mine"class="btn btn-info" role="button">My Questions</a>
    <a href=".?action=display_questions&userId=<?php echo $userId; ?>&listType=all"class="btn btn-info" role="button">All Questions</a><br><br>

<?php include('abstract-views/footer.php'); ?>