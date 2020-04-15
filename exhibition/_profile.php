<?php
$user = (new userMap())->findProfileById($id);
if ($user) {
    ?>
    <tr>
        <th>Имя</th>
        <td><?=$user->name;?></td>
    </tr>
    <tr>
        <th>Пол</th>
        <td><?=$user->gender_id;?></td>
    </tr>
    <tr>
        <th>Дата рождения</th>
        <td><?=date("d.m.Y", strtotime($user->birthday));?></td>
    </tr>

<?php } ?>