<h1>Liste des utilisateurs</h1>
<div id="container-list">
    <div id="listUser">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Détails</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody> <?php
            foreach ($data['users_list'] as $user) {
                /* @var User $user */ ?>
                <tr>
                    <td><?= $user->getId() ?></td>
                    <td><?= $user->getFirstname() ?></td>
                    <td><?= $user->getLastname() ?></td>
                    <th>
                        <a href="/index.php?c=user&a=show-user&id=<?= $user->getId() ?>">Voir plus</a>
                    </th>
                    <td>
                        <a href="/index.php?c=user&a=delete-user&id=<?= $user->getId() ?>">Supprimer</a>
                    </td>
                </tr> <?php
            } ?>
            </tbody>
        </table>
    </div>
</div>
