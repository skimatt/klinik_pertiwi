<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('templates/admin/header'); ?>
<?php $this->load->view('templates/admin/sidebar'); ?>
<div class="flex-1 ml-0 md:ml-64 pt-20 p-6">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manajemen Pengguna</h2>
        <div class="mb-4">
            <a href="<?php echo base_url('admin/user/tambah'); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Tambah Pengguna</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 border">Username</th>
                        <th class="p-3 border">Nama Pengguna</th>
                        <th class="p-3 border">Role</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($user_list) && !empty($user_list)): ?>
                        <?php foreach ($user_list as $user): ?>
                            <tr class="hover:bg-gray-100">
                                <td class="p-3 border"><?php echo htmlspecialchars($user->username); ?></td>
                                <td class="p-3 border"><?php echo htmlspecialchars($user->nama_user); ?></td>
                                <td class="p-3 border"><?php echo htmlspecialchars($user->role); ?></td>
                                <td class="p-3 border">
                                    <a href="<?php echo base_url('admin/user/edit/' . $user->id_user); ?>" class="text-blue-600 hover:underline">Edit</a>
                                    <a href="<?php echo base_url('admin/user/hapus/' . $user->id_user); ?>" class="text-red-600 hover:underline ml-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="p-3 border text-center">Tidak ada data pengguna.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const sidebar = document.querySelector('.fixed');
        sidebar.classList.toggle('-translate-x-full');
    });
</script>
</body>
</html>