<div>Home</div>

<table>


     <?php foreach($users as $user):?>
 
    <tr>
        <td><?=$user->id?></td>
        <td><?=$user->email?></td>
        <td><?=$user->date_created?></td>
    </tr>
    
    <?php endforeach;?>



</table>