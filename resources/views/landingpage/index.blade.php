<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Van Gogh Art Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    /* Wrapper untuk gambar-gambar hero */
    .hero-wrapper {
        display: flex;
        overflow: hidden;
        width: 100%;
        height: 100vh;
        position: relative;
    }

    /* Setiap gambar hero */
    .hero-image {
        width: 100%;
        height: 100vh;
        object-fit: cover;
        position: absolute; /* Mengatur posisi absolute untuk semua gambar */
        top: 0;
        left: 0;
        opacity: 0; /* Mulai dengan opacity 0 */
        transition: opacity 1s ease-in-out; /* Transisi opacity */
    }

    /* Gambar yang ditampilkan */
    .visible {
        opacity: 1; /* Gambar yang ditampilkan memiliki opacity 1 */
    }
</style>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <div class="navbar flex justify-between items-center bg-black p-4">
        <div class="logo">
            <h1 class="text-2xl font-bold text-white">Van Gogh | Art Gallery</h1>
        </div>
        <div class="nav-links flex space-x-4">
            <a href="#home" class="text-white hover:underline">Home</a>
            <a href="#collection" class="text-white hover:underline">Collection</a>
            <a href="#footer" class="text-white hover:underline">About</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div id="home" class="hero-wrapper">
    @foreach($hero as $img)
    <div class="hero-image">
        <img src="storage/{{$img->image}}" alt="Art gallery interior with paintings on the walls" class="w-full h-screen object-cover">
        <div class="hero-text absolute inset-0 flex flex-col justify-center items-center text-center bg-black bg-opacity-50 text-white px-4">
            <p class="text-xl font-light italic mb-4">
                “I sometimes make change to the subject, but still don’t invent the whole of the painting. I find it ready made but to be untangled in the world.” - Van Gogh
            </p>
            <button onclick="location.href='#About'" class="bg-black hover:bg-black text-white px-6 py-2 rounded">MORE</button>
        </div>
    </div>
    @endforeach
</div>

    <!-- Welcome Section -->
    <div id="About" class="welcome-section text-center py-16 bg-white">
        <h2 class="text-3xl font-bold mb-4">Welcome to Van Gogh Art Gallery</h2>
        <p class="max-w-2xl mx-auto text-gray-600">
            Welcome to the Van Gogh Art Gallery, where you can explore the vibrant colors and expressive brushstrokes of one of history’s greatest artists. Discover a collection of his iconic works that continue to inspire and captivate art lovers around the world.
        </p>
    </div>

    <!-- Collection Section -->
    <div id="collection" class="collection-section py-16 bg-gray-100">
        <h2 class="text-3xl font-bold text-center mb-8">Collection</h2>
        <div class="collection-grid grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Collection Item Template -->
             @foreach($collection as $row)
            <div class="collection-item bg-white shadow rounded overflow-hidden">
                <img src="storage/{{$row->picture}}" alt="Head of a Skeleton with a Burning Cigarette by Vincent Van Gogh, 1887" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold">
                        {{$row->name}}
                    </h3>
                    <p class="text-gray-600">{{$row->artist}}, {{$row->year}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <div id="footer" class="footer bg-gray-800 text-white py-8 text-center">
        <p class="font-bold">Van Gogh | ART Gallery</p>
        @foreach($footer as $footer)
        <p class="text-gray-400 max-w-3xl mx-auto mt-2">
            {{$footer->footer}}
        </p>
        @endforeach
    </div>


   
    <script>
    // Mengambil semua gambar hero dari DOM
    const heroImages = document.querySelectorAll('.hero-image');
    let currentIndex = 0;

    // Fungsi untuk mengubah gambar hero
    function changeHeroImage() {
        // Menghapus kelas "visible" pada gambar saat ini
        heroImages[currentIndex].classList.remove('visible');

        // Menghitung gambar berikutnya
        currentIndex = (currentIndex + 1) % heroImages.length;

        // Menambahkan kelas "visible" pada gambar berikutnya
        heroImages[currentIndex].classList.add('visible');
    }

    // Menampilkan gambar pertama secara default
    heroImages[currentIndex].classList.add('visible');

    // Mengatur interval untuk mengganti gambar setiap 5 detik
    setInterval(changeHeroImage, 5000);
</script>
</body>
</html>
