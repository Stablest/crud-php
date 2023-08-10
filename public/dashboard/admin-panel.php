<div class="w-100 p-4 border d-flex flex-column align-items-center">
    <div>
        <button class="" id="salvar">Salvar</button>
        <button class="" id="salvar">Deletar</button>
        <div id="container">
            <table class="bg-info border rounded-2">
                <thead>
                    <tr>
                        <th class="px-3">#</th>
                        <th class="px-3">username</th>
                        <th class="px-3">email</th>
                        <th class="px-3">permission</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        require_once './../../src/dbconnection.inc.php';
                        require_once './../../src/user/user-controller.inc.php';
                        require_once './../../src/user/user-model.inc.php';
                        require_once './../../src/session.inc.php';
                        $users = get_all_users($pdo);
                        $pdo = null;
                        $stmt = null;
                    } catch (PDOException $e) {
                        die('Something went wrong : ' . $e->getMessage());
                    }
                    foreach ($users as $user) { ?>
                        <tr>
                            <td class="px-3" data-value="<?php echo htmlspecialchars($user['id']) ?>">
                                <input type="checkbox" name="check_<?php echo htmlspecialchars($user['id']) ?>" />
                            </td>
                            <td class="px-3" data-value="<?php echo htmlspecialchars($user['id']) ?>">
                                <input type="text" hidden name="username_<?php echo htmlspecialchars($user['id']) ?>" placeholder="Usuário" />
                                <span><?php echo htmlspecialchars($user['username']) ?></span>
                            </td>
                            <td class="px-3" data-value="<?php echo htmlspecialchars($user['id']) ?>">
                                <input type="email" hidden name="email_<?php echo htmlspecialchars($user['id']) ?>" placeholder="E-mail" />
                                <span><?php echo htmlspecialchars($user['email'])  ?></span>
                            </td>
                            <td class="px-3" data-value="<?php echo htmlspecialchars($user['id']) ?>">
                                <input type="text" hidden name="permission_<?php echo htmlspecialchars($user['id']) ?>" placeholder="Permissão" />
                                <span><?php echo htmlspecialchars($user['permission'])  ?></span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>;

        </div>
    </div>
</div>
<script type="module" src='./../helpers/scripts/admin-panel-table-interact.js'></script>