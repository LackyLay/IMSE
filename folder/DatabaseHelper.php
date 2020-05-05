<?php

class DatabaseHelper
{
    protected $username ="root";
    protected $password = 'root';
    protected $servername = "mysql:host=localhost;port=3306;dbname=wineapp";

    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->servername, $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "Connected successfully";
        }
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Used to clean up
    public function __destruct()
    {
        $conn = null;
    }



// MEMBER
    public function selectFromMemberWhere($mem_id, $nickname, $country)
    {
        $sql = "SELECT * FROM member
            WHERE mem_id LIKE '%{$mem_id}%'
              AND lower(nickname) LIKE lower('%{$nickname}%')
              AND lower(country) LIKE lower('%{$country}%')
            ORDER BY mem_id";

        $stmt = $this->conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }
    
    //Login
    public function selectFromMemberLoginWhere($nickname)
    {
        $sql = "SELECT * FROM member
            WHERE nickname LIKE '%{$nickname}%'
            ORDER BY nickname";
        
        $result = mysqli_query($conn, $sql);
       
        
        return $result;
    }

    
    
    
    
    

    public function insertIntoMember($nickname, $country)
    {
        $sql = "INSERT INTO MEMBER (NICKNAME, COUNTRY) VALUES ('@{$nickname}', '{$country}')";

        try {
            $this->conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function updateMember($mem_id, $country)
    {
        $sql = "UPDATE MEMBER SET country = '{$country}' WHERE mem_id = {$mem_id}";

        try {
            $this->conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

// doesn't work
    public function deleteMember($mem_id)
    {
        $errorcode = 0;


        $sql = "DELETE FROM member WHERE  mem_id = {$mem_id}";

        try {
            $this->conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }



// REVIEW
    public function insertIntoReview($points, $date_rev, $mem_id, $wine_id)
    {
        $sql = "INSERT INTO review (points, date_rev, member_id, wine_id) 
                VALUES ({$points}, str_to_date('{$date_rev}','%Y-%m-%d'), {$mem_id}, {$wine_id})";


        try {
            $this->conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function deleteReview($review_id)
    {
        $errorcode = 0;


        $sql = 'BEGIN P_DELETE_REVIEW(:review_id, :errorcode); END;';
        $statement = @oci_parse($this->conn, $sql);

        @oci_bind_by_name($statement, ':review_id', $review_id);
        @oci_bind_by_name($statement, ':errorcode', $errorcode);

        @oci_execute($statement);
        @oci_free_statement($statement);

        //$errorcode == 1 => success
        //$errorcode != 1 => Oracle SQL related errorcode;
        return $errorcode;
    }

    public function updateReview($review_id, $points)
    {
        $sql = "UPDATE REVIEW SET points = '{$points}' WHERE review_id = {$review_id}";

        try {
            $this->conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function selectFromReviewWhere($review_id, $points, $date_rev, $mem_id, $wine_id)
    {
        $sql = "SELECT * FROM review
            WHERE review_id LIKE '%{$review_id}%'
              AND points LIKE '%{$points}%'
              AND date_rev LIKE '%{$date_rev}%'
              AND member_id LIKE '%{$mem_id}%'
              AND wine_id LIKE '%{$wine_id}%'
            ORDER BY review_id";

        $stmt = $this->conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;

        return $result;
    }


// WANT TRY
    public function selectFromWantTryWhere($mem_id, $wine_id)
    {
        $sql = "SELECT * FROM want_try
            WHERE member_id LIKE '%{$mem_id}%'
              AND wine_id LIKE '%{$wine_id}%'
            ORDER BY member_id";

        $stmt = $this->conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;

        return $result;
    }

    public function updateWantTry($mem_id, $wine_id, $wine_id_new)
    {
        $sql = "UPDATE want_try SET wine_id = '{$wine_id_new}' 
                WHERE member_id = {$mem_id} AND wine_id = {$wine_id}";

        try {
            $this->conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteWantTry($mem_id, $wine_id)
    {
        $errorcode = 0;


        $sql = 'BEGIN P_DELETE_WANT_TRY(:member_id, :wine_id, :errorcode); END;';
        $statement = @oci_parse($this->conn, $sql);

        @oci_bind_by_name($statement, ':member_id', $mem_id);
        @oci_bind_by_name($statement, ':wine_id', $wine_id);
        @oci_bind_by_name($statement, ':errorcode', $errorcode);

        @oci_execute($statement);
        @oci_free_statement($statement);

        return $errorcode;
    }

    public function insertIntoWantTry($mem_id, $wine_id)
    {
        $sql = "INSERT INTO want_try (member_id, wine_id) 
                VALUES ({$mem_id}, {$wine_id})";


        try {
            $this->conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }




// WINE
    public function insertIntoWine($color, $vintage, $winery_name, $grape_name)
    {
        $sql = "INSERT INTO wine (color, vintage, winery_name, grape_name) 
                VALUES ('{$color}', {$vintage}, '{$winery_name}', '{$grape_name}')";


        try {
            $this->conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function deleteWine($wine_id)
    {
        $errorcode = 0;


        $sql = 'BEGIN P_DELETE_WINE(:wine_id, :errorcode); END;';
        $statement = @oci_parse($this->conn, $sql);

        @oci_bind_by_name($statement, ':wine_id', $wine_id);
        @oci_bind_by_name($statement, ':errorcode', $errorcode);

        @oci_execute($statement);
        @oci_free_statement($statement);

        return $errorcode;
    }

    public function updateWine($wine_id, $vintage)
    {
        $sql = "UPDATE WINE SET vintage = '{$vintage}' WHERE wine_id = {$wine_id}";

        try {
            $this->conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function selectFromWineWhere($wine_id, $color, $vintage, $winery_name, $grape_name)
    {
        $sql = "SELECT * FROM wine
            WHERE wine_id LIKE '%{$wine_id}%'
              AND lower(color) LIKE lower('%{$color}%')
              AND vintage LIKE '%{$vintage}%'
              AND lower(winery_name) LIKE lower('%{$winery_name}%')
              AND lower(grape_name) LIKE lower('%{$grape_name}%')
            ORDER BY wine_id";

        $stmt = $this->conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;

        return $result;
    }
}