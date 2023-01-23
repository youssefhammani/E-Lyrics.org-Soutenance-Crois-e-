<?php

class MusicInfo {
    public static function getAll()
    {
        $sql    = "SELECT * FROM `Music`";
        $stmt   = Database::connect()->prepare($sql);
        
        $stmt->execute();

        $rows = $stmt->fetch();

        return $rows;
    }

    public static function addSinger()
    {
        $sql    = "SELECT * FROM artist";
        $stmt   = Database::connect()->query($sql);

            while ($row = $stmt->fetch())
            {
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
    }

    public static function addAlbum()
    {
        $sql    = "SELECT * FROM album";
        $stmt   = Database::connect()->query($sql);
        
        while ($row = $stmt->fetch())
        {
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }

    public static function insertMusic($singer, $song, $album, $lyric, $date)
    {
        for ($i = 0; $i < count($album); $i++)
        {
            $sql    = "INSERT INTO `Music`(`album_id`, `artist_id`,`title`, `words`, `Date`) VALUES ('$album[$i]', '$singer[$i]', '$song[$i]', '$lyric[$i]', '$date[$i]')";
            $stmt   = Database::connect()->prepare($sql);
            
            $stmt->execute();
        }
    }

    // public static function insertMusic($data)
    // {
    //     $code_ver = "0";

    //     $sql  = "INSERT INTO `Music`(`album_id`, `artist_id`,`title`, `words`) VALUES (':album', ':artist', ':title', ':words')";
    //     $stmt = Database::connect()->prepare($sql);

    //     $stmt->bindParam(':album', $data['Album']);
    //     $stmt->bindParam(':artist', $data['Singer']);
    //     $stmt->bindParam(':title', $data['Song']);
    //     $stmt->bindParam(':words', $data['Lyric']);

    //     $result = $stmt->execute();

    //     return $result;
    // }

    public static  function editInsertMusic($id, $singer, $song, $album, $lyric, $date)
    {
        $sql    = "UPDATE `Music` SET `album_id` = '$album', `artist_id` = '$singer',`title` = '$song', `words` = '$lyric', `Date` = '$date' WHERE `id` = '$id'";
        $stmt   = Database::connect()->prepare($sql);
        $result = $stmt->execute();

        return $result;
    }

    public static function addData()
    {
        $sql    = "SELECT album.name as Album , artist.name as Artist , Music.* FROM Music JOIN album ON Music.album_id = album.id JOIN artist ON Music.artist_id = artist.id";
        $stmt   = Database::connect()->query($sql);

        $count  = 1;

        while ($rows = $stmt->fetch())
        {
            $id = $rows['id'];

            echo '<tr class="cart">
                    <td id="id-info'.$id.'" data="'.$rows['id'].'">'.$count++.'</td>
                    <td id="Name-Singer'.$id.'" data="'.$rows['artist_id'].'">'.$rows['Artist'].'</td>
                    <td id="Name-Song'.$id.'" data="'.$rows['title'].'">'.$rows['title'].'</td>
                    <td id="Name-Album'.$id.'" data="'.$rows['album_id'].'">'.$rows['Album'].'</td>
                    <td id="Song-Lyric'.$id.'" data="'.$rows['words'].'">
                        <button type="button" class="btn btn-outline-success" href="#show" onclick="lyricsDisplay('.$rows['id'].')" data-bs-toggle="modal">Lyrics display</button>
                    </td>
                    <td id="Date'.$id.'" data="'.$rows['Date'].'">'.$rows['Date'].'</td>
                    <td class="">
                        <a class="btn btn-sm btn-outline-info" href="#modal-edit" onclick="editForm('.$rows['id'].')" data-bs-toggle="modal">Edit</a>
                        <button type="submit" class="btn btn-sm btn-outline-primary" name="delete" href="#delet" onclick="showid('.$rows['id'].')" data-bs-toggle="modal">Delete</button>
                    </td>
                </tr>
            ';
        }
    }

    public static function deleteMusic($id)
    {
        $sql    = "DELETE FROM `Music` WHERE id = $id";
        $stmt   = Database::connect()->prepare($sql);
        $result = $stmt->execute();

        return $result;
    }

    public static function insertSinger($singername)
    {
       $sql     = "INSERT INTO `artist`(`name`) VALUES ('$singername')"; 
       $stmt    = Database::connect()->prepare($sql);

       return $stmt->execute();
    }

    public static function insertAlbum($album_name)
    {
        $sql    = "INSERT INTO `album`(`name`) VALUES ('$album_name')";
        $stmt   = Database::connect()->prepare($sql);

        return $stmt->execute();
    }

    public static function showStatistics($table)
    {
        $sql    = "SELECT * FROM $table";
        $stmt   = Database::connect()->query($sql)->rowCount();
        
        echo $stmt;
    }
}
