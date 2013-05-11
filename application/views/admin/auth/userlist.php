<a href="/admin/emails/create_message/" class="button">Создать сообщение</a>
Список email:
<table class="extended">
    <thead>
    <tr>
       <th>username</th>
       <th>name</th>
       <th>email</th>
       <th>city</th>
       <th>active</th>
       <th>group</th>
    </tr>
    </thead>
<tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['username']?></td>
        <td><?php echo $user['first_name']?> <<?php echo $user['last_name']?></td>

        <td><?php echo $user['email']?></td>
        <td><?php echo $user['company']?></td>
        <td><?php echo $user['active']?'yes':'no'?></td>
        <td><?php echo $user['group']?></td>

    </tr>
    <?php endforeach;?>
</tbody>
</table>