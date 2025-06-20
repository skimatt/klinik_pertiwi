<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('templates/admin/header'); ?>
<?php $this->load->view('templates/admin/sidebar'); ?>
<div class="flex-1 ml-0 md:ml-64 pt-20 p-6">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tambah Pengguna Baru</h2>
        <?php echo validation_errors('<div class="text-red-600 text-sm">', '</div>'); ?>
        <?php echo form_open('admin/user/tambah', ['class' => 'space-y-4']); ?>
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label for="nama_user" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                <input type="text" name="nama_user" id="nama_user" value="<?php echo set_value('nama_user'); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" id="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                </select>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Simpan</button>
            <a href="<?php echo base_url('admin/user'); ?>" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">Kembali</a>
        <?php echo form_close(); ?>
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