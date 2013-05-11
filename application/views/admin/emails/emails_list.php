 <a href="/admin/emails/create_message/" class="button">Создать сообщение</a>
Список email:
<table class="extended">
    <tr>
        <td>id</td>
        <td>email</td>
        <td>ip</td>
        <td>info</td>

    </tr>
    <?php foreach ($email_addresses as $email): ?>
    <tr>
        <td><?php echo $email->id?></td>
        <td><?php echo $email->email?></td>
        <td><?php echo $email->ipaddr?></td>
        <td><?php echo $email->info?></td>

    </tr>
    <?php endforeach;?>
</table>