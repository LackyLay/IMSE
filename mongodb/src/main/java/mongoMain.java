


import com.mongodb.BasicDBList;
import com.mongodb.BasicDBObject;
import com.mongodb.DBObject;
import com.mongodb.MongoCommandException;
import com.mongodb.client.MongoClients;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.util.JSON;
import org.bson.Document;
import org.json.simple.JSONObject;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class mongoMain {
    public static void main(String[] args) throws SQLException {

        try{
            Class.forName("com.mysql.jdbc.Driver");
            Connection con=DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/wineapp?serverTimezone=UTC","root","root");


            Statement stmt=con.createStatement();
            ResultSet rs=stmt.executeQuery("select * from member");



            try (var mongoClient = MongoClients.create("mongodb://localhost:27017")) {

                var database = mongoClient.getDatabase("wineapp");
                database.drop();


                //------------------Member---------------------------
                try {
                    database.createCollection("member");
                    System.out.println("Collection created successfully");
                } catch (MongoCommandException e) {
                    database.getCollection("member").drop();
                }

                while(rs.next()) {
                    Statement stmt2=con.createStatement();
                    ResultSet rs2=stmt2.executeQuery("select * from follow where member_id1 like " + rs.getString("mem_id"));

                    Statement stmt3=con.createStatement();
                    ResultSet rs3=stmt3.executeQuery("select * from want_try where member_id like " + rs.getString("mem_id"));

                    MongoCollection<Document> collection = database.getCollection("member");

                    var d1 = new Document("_id", rs.getInt("mem_id"));
                    d1.append("nickname", rs.getString("nickname"));
                    d1.append("country", rs.getString("country"));
                    d1.append("status", rs.getString("status"));

                    List list = new ArrayList();


                    while(rs2.next()) {
                        list.add(rs2.getString("member_id2"));
                    }
                    d1.append("follow", list);

                    List list2 = new ArrayList();


                    while(rs3.next()) {
                        list2.add(rs3.getString("wine_id"));
                    }
                    d1.append("want_try", list2);
                    collection.insertOne(d1);
                }

//--------------------Wine-----------------------------------------
                Statement wineStmt=con.createStatement();
                ResultSet rsWine=wineStmt.executeQuery("select * from wine");

                try {
                    database.createCollection("wine");
                    System.out.println("Collection created successfully");
                } catch (MongoCommandException e) {
                    database.getCollection("wine").drop();
                }

                while(rsWine.next()) {

                    Statement stmtReview=con.createStatement();
                    ResultSet rsReview=stmtReview.executeQuery("select * from review where wine_id like " + rsWine.getString("wine_id"));




                    MongoCollection<Document> collection2 = database.getCollection("wine");

                    var d1 = new Document("_id", rsWine.getInt("wine_id"));
                    d1.append("color", rsWine.getString("color"));
                    d1.append("vintage", rsWine.getString("vintage"));
                    d1.append("winery_name", rsWine.getString("winery_name"));
                    d1.append("grape_name", rsWine.getString("grape_name"));


                    List listReview = new ArrayList();




                    while(rsReview.next()) {
                        var d2 = new Document("_id", rsReview.getInt("review_id"));
                        d2.append("points", rsReview.getString("points"));
                        d2.append("date_rev", rsReview.getDate("date_rev"));
                        d2.append("member_id", rsReview.getString("member_id"));

                        listReview.add(d2);
                    }
                    d1.append("review", listReview);

                    List listGrape = new ArrayList();












                    collection2.insertOne(d1);
                }






                MongoCollection < Document > collection = database.getCollection("member");
                try (MongoCursor< Document > cur = collection.find().iterator()) {

                    while (cur.hasNext()) {

                        var doc = cur.next();
                        var users = new ArrayList < > (doc.values());

                        System.out.printf("%s: %s%n", users.get(1), users.get(2));
                    }
                }

            }
        } catch (ClassNotFoundException classNotFoundException) {
            classNotFoundException.printStackTrace();
        }
    }
}
