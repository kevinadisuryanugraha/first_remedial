<?php 

session_start();

if($_SESSION["username"] === null){
    header("Location: login.php");
}

include_once('./Students.php');

$students = Student::index();

if(isset($_POST['submit'])){
  Student::set_name($_POST['name']);
  Student::set_nis($_POST['nis']);
  Student::set_phone($_POST['phone']);

  $response = Student::create();
  
  setcookie('message', $response, time() + 10);

  header("Location: home.php");
}

if(isset($_POST['delete'])){
  $response = Student::delete($_POST['id']);

  setcookie('message', $response, time() + 10);

  header("Location: home.php");
}

?>

<?php include('./component/top.php'); ?>
    <!-- header -->
<?php include('./component/header.php'); ?>

<!-- content -->
<div class="bg-slate-500 rounded-xl p-3 absolute top-1/2 -translate-y-12  left-1/2 -translate-x-1/2 hidden"></div>

    <!-- alert -->
<?php include('./component/alert.php'); ?>

    <!-- main -->
    <div class="flex">
      <!-- sidebar -->
      <div class="basis-1/4 bg-gray-300 p-5">
        <form class="rounded-xl bg-white p-4" action="" method="POST">
          <h1 class="pb-5 pt-1 font-semibold
            text-3xl text-center">Form Input Nilai</h1>
          <div class="mb-3">
            <label for="nama">Nama :</label>
            <input class=" w-full block placeholder:font-light rounded border border-blue-300 p-1" id="name" name="name" type="text"
              placeholder="Nama Lengkap">
          </div>
          <div class=" mb-3">
            <label for="nis">nis :</label>
            <input class=" block w-full placeholder:font-light rounded border border-blue-300 p-1" id="nis" name="nis"
              type="number" placeholder="Nis">
          </div>
          <div class=" mb-3">
            <label for="phone">phone :</label>
            <input class=" block w-full placeholder:font-light rounded border border-blue-300 p-1" id="phone" name="phone"
              type="number" placeholder="Phone">
          </div>
          <div class="gap-2">
            <button name="submit" class=" text-white bg-green-500 hover:bg-green-600 pt-2 pb-2 pr-6 pl-6 rounded-xl ">Submit</button>
          </div>
        </form>
      </div>
      <!-- content -->
      <div class="basis-3/4 bg-blue-400">
        <div class="rounded-xl m-5 bg-white p-5">
          <h1 class="pb-6 font-semibold text-3xl text-center">.⋆｡˚📝˚｡Tabel Siswa｡˚📝˚｡⋆.</h1>
          <table class="border text-center w-full ">
            <thead class="border bg-green-600 text-white">
              <tr>
                <th class="w-20 p-3">No</th>
                <th class=" w-96">Nama</th>
                <th class="">Nis</th>
                <th class="">Phone</th>
                <th class="">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-green-400">
              <?php foreach ($students as $key => $student) : ?>
              <tr class="border">
                <td class="p-4"><?= $key + 1 ?></td>
                <td><?= $student['name'] ?></td>
                <td><?= $student['nis'] ?></td>
                <td><?= $student['phone'] ?></td>
                <td>
                  <a class="text-white hover:bg-blue-800 pt-2 pb-2 pr-3 pl-3 rounded-xl bg-blue-500" href="detail.php?id=<?= $student['id'] ?>" >Detail</a>
                  <a href="edit.php?id=<?= $student['id'] ?>" class="text-white hover:bg-blue-800 pt-2 pb-2 pr-3 pl-3 rounded-xl bg-blue-500">Edit</a>
                  <form action="" method="POST" class="inline">
                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                    <button name="delete" type="submit" class="bg-red-500 hover:bg-red-800 p-2 rounded-xl text-white">Hapus</button>
                  </form>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- footer -->
    <?php include('./component/footer.php'); ?>
    <?php include('./component/bottom.php'); ?>