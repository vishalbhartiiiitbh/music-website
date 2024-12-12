<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Website - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            background: linear-gradient(135deg, #FFD700 25%, #FF69B4 50%, #FF1493 75%, #FFD700);
            background-size: 400% 400%;
            animation: glitterBG 10s ease infinite;
        }

        @keyframes glitterBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        header {
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 15px 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            border-bottom: 3px solid #FF1493;
        }

        h1 {
            margin: 0;
            font-size: 2.5rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        nav {
            margin: 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: #FF1493;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s, transform 0.3s;
        }

        nav a:hover {
            color: #FFD700;
            transform: scale(1.1);
        }

        .search-bar {
            position: relative;
            max-width: 300px;
            margin: 0 auto;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #FF1493;
            border-radius: 20px;
            outline: none;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .welcome {
            margin-bottom: 30px;
            text-align: center;
        }

        h2 {
            color: #FF1493;
            font-size: 2rem;
        }

        h3 {
            text-align: center;
            color: #2c2c2c;
            font-size: 1.75rem;
        }

        .playlist {
            margin: 20px 0;
        }

        .music-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 15px 0;
            padding: 15px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .music-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .music-title {
            flex: 1;
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            font-weight: 500;
            color: #2c2c2c;
        }

        .music-artist {
            margin-left: 10px;
            font-weight: normal;
            color: #666;
        }

        .serial-number {
            margin-right: 15px;
            font-weight: bold;
            color: #FF1493;
        }

        audio {
            width: 100%;
            margin-top: 10px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
            border-top: 3px solid #FF1493;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>

<header>
    <h1>Music Playlist</h1>
    <nav>
        <a href="logout.php">Logout</a>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search songs...">
        </div>
    </nav>
</header>

<div class="container">
    <div class="welcome">
        <h2>Welcome to the Music Website, <?php echo $_SESSION['username']; ?>!</h2>
    </div>

    <h3>Top Trending Songs</h3>
    <div class="playlist" id="musicPlaylist">
        <?php
        $music_files = [
            ["title" => "GOA BEACH", "artist" => "@TonyKakkar Neha Kakkar ", "file" => "song1.mp3"],
            ["title" => "Kali-Kali Zulfon Ke", "artist" => "@Madhur Sharma Ustad Nusrat ", "file" => "song2.mp3"],
            ["title" => "JO TUM MERE HO", "artist" => "@Anuv Jain", "file" => "song3.mp3"],
            ["title" => "Teri Ada ", "artist" => "Kaushik-Guddu | Mohit Chauhan ft.Saumya U ", "file" => "song4.mp3"],
            ["title" => "Kabhii Tumhhe", "artist" => " Shershaah | Sidharth–Kiara | Javed-Mohsin | Darshan Raval", "file" => "song5.mp3"],
            ["title" => "Kaise Hua", "artist" => "| Kabir Singh | Shahid K, Kiara A, Sandeep V | Vishal Mishra, Manoj", "file" => "song6.mp3"],
            ["title" => "Channa Ve", "artist" => " Bhoot - Part One: The Haunted Ship | Vicky K & Bhumi P ", "file" => "song7.mp3"],
            ["title" => "Neele Neele Ambar Par", "artist" => " Kishore Kumar, Kalyanji-Anandji", "file" => "song8.mp3"],
            ["title" => "Gulabi Aankhen", "artist" => " Sanam", "file" => "song9.mp3"],
            ["title" => "O Mere Dil Ke Chain", "artist" => " Sanam", "file" => "song10.mp3"],
            ["title" => "Baby Mere Birthday Pe Goli Chalegi ", "artist" => " Pranjal Dahiya", "file" => "song11.mp3"],
            ["title" => "Mere Mehboob  ", "artist" => " Rajkummar | Triptii Dimri", "file" => "song12.mp3"],
            ["title" => "LALA LORI : Fazilpuria ft. Deepti   ", "artist" => " Afsana Khan | Jaani | SukhE |", "file" => "song13.mp3"],
            ["title" => "18 Lakh - Mera Ek Ek Suit Pade Dhai Lakh Ka  ", "artist" => "  Biru Kataria, Fiza, Raj Mawar", "file" => "song14.mp3"],
            ["title" => " Naach Re Patarki ", "artist" => "  Akansha ", "file" => "song15.mp3"],
            ["title" => "Aaj Ki Raat  ", "artist" => " Tamannaah Bhatia | Sachin-Jigar |", "file" => "song16.mp3"],
            ["title" => "Kala Chashma   ", "artist" => "Sidharth M Katrina K | Prem, Hardeep,", "file" => "song17.mp3"],
            ["title" => "Hero Handa    ", "artist" => "Khushi Baliyan Punit Choudhary Raj Mawer", "file" => "song18.mp3"],
            ["title" => "Gypsy | Balam Thanedar   ", "artist" => "Pranjal Dahiya & Dinesh Golan ", "file" => "song19.mp3"],
            ["title" => "Kabootar - Renuka Panwar   ", "artist" => "Pranjal Dahiya, Vivek, Surender Romio ", "file" => "song20.mp3"],
        
    ];

        foreach ($music_files as $index => $music) {
            echo "<div class='music-card' data-title='{$music['title']}' data-artist='{$music['artist']}'>";
            echo "<div class='music-title'>";
            echo "<span class='serial-number'>" . ($index + 1) . ".</span>";
            echo "<span>{$music['title']}</span>";
            echo "<span class='music-artist'>by {$music['artist']}</span>";
            echo "</div>";
            echo "<audio controls class='audio' id='audio-$index' data-index='$index'>
                    <source src='{$music['file']}' type='audio/mpeg'>
                    Your browser does not support the audio tag.
                  </audio>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 Vishal Bharti Music Website. All rights reserved.</p>
</footer>

<script>
    const searchInput = document.getElementById('searchInput');
    const musicCards = document.querySelectorAll('.music-card');

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase();
        musicCards.forEach(card => {
            const title = card.getAttribute('data-title').toLowerCase();
            const artist = card.getAttribute('data-artist').toLowerCase();
            if (title.includes(query) || artist.includes(query)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    });

    const audios = document.querySelectorAll('audio');
    
    audios.forEach((audio, index) => {
        audio.addEventListener('play', () => {
            audios.forEach((otherAudio, otherIndex) => {
                if (otherIndex !== index) {
                    otherAudio.pause();
                }
            });
        });

        audio.addEventListener('ended', () => {
            if (index < audios.length - 1) {
                audios[index + 1].play();
            }
        });
    });
</script>

</body>
</html>
