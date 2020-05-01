//Database Systems (Module IDS) 

import java.sql.*;
import java.util.ArrayList;


class DatabaseHelper {
    private static final String DB_CONNECTION_URL = "jdbc:mysql://localhost:3306/wineapp?serverTimezone=UTC#";
    private static final String USER = "root";
    private static final String PASS = "root";

    private static final String CLASSNAME = "com.mysql.cj.jdbc.Driver";

    private static Statement stmt;
    private static Connection con;

    //CREATE CONNECTION
    DatabaseHelper() {
        try {
            //Loads the class into the memory
            Class.forName(CLASSNAME);

            // establish connection to database
            con = DriverManager.getConnection(DB_CONNECTION_URL, USER, PASS);
            stmt = con.createStatement();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }


    //INSERT INTO
    void insertIntoMember(String nickname, String country) {
        try {
            String sql = "INSERT INTO MEMBER (nickname, country) VALUES ('@" +
                    nickname +
                    "', '" +
                    country +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoMember\nmessage: " + e.getMessage());
        }
    }

    void insertIntoGrape(String grape_name, String food_paring, String acidity) {
        try {
            String sql = "INSERT INTO GRAPE (grape_name, food_paring, acidity) VALUES ('" +
                    grape_name +
                    "', '" +
                    food_paring +
                    "', '" +
                    acidity +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoGrape\nmessage: " + e.getMessage());
        }
    }

    void insertIntoWinery(String winery_name, String founder, Integer liters_of_wine) {
        try {
            String sql = "INSERT INTO WINERY (winery_name, founder, liters_of_wine) VALUES ('" +
                    winery_name +
                    "', '" +
                    founder +
                    "', '" +
                    liters_of_wine +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoWinery\nmessage: " + e.getMessage());
        }
    }

    void insertIntoСountry(String country_name, Integer vineyard_area, Integer population) {
        try {
            String sql = "INSERT INTO COUNTRY (country_name, vineyard_area, population) VALUES ('" +
                    country_name +
                    "', '" +
                    vineyard_area +
                    "', '" +
                    population +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoСountry\nmessage: " + e.getMessage());
        }
    }

    void insertIntoWine(String color, Integer vintage, String winery_name, String grape_name) {
        try {
            String sql = "INSERT INTO WINE (color, vintage, winery_name, grape_name) VALUES ('" +
                    color +
                    "', '" +
                    vintage +
                    "', '" +
                    winery_name +
                    "', '" +
                    grape_name +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoWine\nmessage: " + e.getMessage());
        }
    }

    void insertIntoReview(Integer points, String date_rev, Integer member_id, Integer wine_id) {
        try {
            String sql = "INSERT INTO Review (points, date_rev, member_id, wine_id) VALUES ('" +
                    points +
                    "', DATE '" +
                    date_rev +
                    "', '" +
                    member_id +
                    "', '" +
                    wine_id +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoReview\nmessage: " + e.getMessage());
        }
    }

    void insertIntoRegion(Integer r_index, Integer m2, String climate, String country_name) {
        try {
            String sql = "INSERT INTO Region (r_index, m2, climate, country_name) VALUES ('" +
                    r_index +
                    "', '" +
                    m2 +
                    "', '" +
                    climate +
                    "', '" +
                    country_name +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoRegion\nmessage: " + e.getMessage());
        }
    }

    void insertIntoAutochthon(Integer tons, Integer export_tons, String grape_name, String country_name) {
        try {
            String sql = "INSERT INTO Autochthon (tons, export_tons, grape_name, country_name) VALUES ('" +
                    tons +
                    "', '" +
                    export_tons +
                    "', '" +
                    grape_name +
                    "', '" +
                    country_name +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoAutochthon\nmessage: " + e.getMessage());
        }
    }

    void insertIntoWorldwide(Integer tons, Integer export_tons, String grape_name) {
        try {
            String sql = "INSERT INTO Worldwide (tons, export_tons, grape_name ) VALUES ('" +
                    tons +
                    "', '" +
                    export_tons +
                    "', '" +
                    grape_name +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoWorldwide\nmessage: " + e.getMessage());
        }
    }

    void insertIntoFollow(Integer member_id1, Integer member_id2) {
        try {
            String sql = "INSERT INTO Follow (member_id1, member_id2) VALUES ('" +
                    member_id1 +
                    "', '" +
                    member_id2 +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoFollow\nmessage: " + e.getMessage());
        }
    }

    void insertIntoWantTry(Integer member_id, Integer wine_id) {
        try {
            String sql = "INSERT INTO want_try (member_id, wine_id) VALUES ('" +
                    member_id +
                    "', '" +
                    wine_id +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoWantTry\nmessage: " + e.getMessage());
        }
    }

    void insertIntoFrom(Integer wine_id, PrimaryKeyRegion region) {
        try {
            String sql = "INSERT INTO from_c (wine_id, region_index, country_name) VALUES ('" +
                    wine_id +
                    "', '" +
                    region.getRegion() +
                    "', '" +
                    region.getCountry() +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoFrom\nmessage: " + e.getMessage());
        }
    }

    void insertIntoHave(PrimaryKeyRegion region, String grape_name) {
        try {
            String sql = "INSERT INTO have (region_index, country_name, grape_name) VALUES ('" +
                    region.getRegion() +
                    "', '" +
                    region.getCountry() +
                    "', '" +
                    grape_name +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoHave\nmessage: " + e.getMessage());
        }
    }

    void insertIntoGrow(String country_name, String grape_name) {
        try {
            String sql = "INSERT INTO grow (country_name, grape_name) VALUES ('" +
                    country_name +
                    "', '" +
                    grape_name +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoGrow\nmessage: " + e.getMessage());
        }
    }





    // SELECT
    ArrayList<String> selectWineryNameFromWinery() {
        ArrayList<String> WineryName = new ArrayList<String>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT winery_name FROM winery ");
            while (rs.next()) {
                WineryName.add(rs.getString("winery_name"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectWineryNameFromWinery\n message: " + e.getMessage()).trim());
        }
        return WineryName;
    }

    ArrayList<String> selectGrapeNameFromGrape() {
        ArrayList<String> GrapeName = new ArrayList<String>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT grape_name FROM grape");
            while (rs.next()) {
                GrapeName.add(rs.getString("grape_name"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectGrapeNameFromGrape\n message: " + e.getMessage()).trim());
        }
        return GrapeName;
    }

    ArrayList<Integer> selectMemberIDFromMember() {
        ArrayList<Integer> MemberID = new ArrayList<Integer>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT mem_id FROM member");
            while (rs.next()) {
                MemberID.add(rs.getInt("mem_id"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectMemberIDFromMember\n message: " + e.getMessage()).trim());
        }
        return MemberID;
    }

    ArrayList<Integer> selectWineIDFromWine() {
        ArrayList<Integer> WineID = new ArrayList<Integer>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT wine_id FROM wine");
            while (rs.next()) {
                WineID.add(rs.getInt("wine_id"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectWineIDFromWine\n message: " + e.getMessage()).trim());
        }
        return WineID;
    }

    ArrayList<String> selectCountryNameFromCountry() {
        ArrayList<String> CountryName = new ArrayList<String>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT country_name FROM country");
            while (rs.next()) {
                CountryName.add(rs.getString("country_name"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectCountryNameFromCountry\n message: " + e.getMessage()).trim());
        }
        return CountryName;
    }

    ArrayList<PrimaryKeyRegion> selectPrimaryKeysFromRegion() {
        ArrayList<PrimaryKeyRegion> PrimaryKeys = new ArrayList<PrimaryKeyRegion>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT r_index, country_name FROM Region");
            while (rs.next()) {
                PrimaryKeyRegion add1 = new PrimaryKeyRegion();
                add1.region_index = rs.getInt("r_index");
                add1.counry_name = rs.getString("country_name");
                PrimaryKeys.add(add1);
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectPrimaryKeysFromRegion\n message: " + e.getMessage()).trim());
        }
        return PrimaryKeys;
    }

    ArrayList<String> selectGrapeFromWorldwide() {
        ArrayList<String> GrapeName = new ArrayList<String>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT grape_name FROM worldwide");
            while (rs.next()) {
                GrapeName.add(rs.getString("grape_name"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectGrapeFromWorldwide\n message: " + e.getMessage()).trim());
        }
        return GrapeName;
    }


    public void close()  {
        try {
            stmt.close(); //clean up
            con.close();
        } catch (Exception ignored) {
        }
    }
}