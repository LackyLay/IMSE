import java.util.ArrayList;

public class TestdataGenerator {

	public static void main(String[] args) {
		
		
		DatabaseHelper dbHelper=new DatabaseHelper();
		RandomHelper rdm = new RandomHelper();

// MEMBER
		for (int i = 0; i < 1000; i++) {
			String firstName = rdm.getRandomFirstName();
			
			String country = rdm.getRandomCountry();
			dbHelper.insertIntoMember(firstName, country);
		}
// GRAPE
		
		for (int i = 0; i < 200; i++) {
			String grape_name = rdm.getGrape(i);
			String food_paring = rdm.getRandomFoodParing();
			String acidity = rdm.getRandomAcidity();
			dbHelper.insertIntoGrape(grape_name, food_paring, acidity);
		}
// WINERY
		System.out.println("11111");
        for (int i = 0; i < 100; i++) {
            String winery_name = rdm.getWinery(i);
            String founder = rdm.getRandomFirstName()+" "+rdm.getRandomLastName();
            Integer liters_of_wine = rdm.getRandomInteger(1000,5000000);
            dbHelper.insertIntoWinery(winery_name, founder, liters_of_wine);
        }
// COUNTRY
		for (int i = 0; i < 100; i++) {
			String country_name = rdm.getCountry(i);
			Integer vineyard_area = rdm.getRandomInteger(100, 1000000);
			Integer population = rdm.getRandomInteger(100000,330936453);
			dbHelper.insertIntoСountry(country_name , vineyard_area , population);
		}
// LIST Winery, Grape
		ArrayList<String> winery_name_list = dbHelper.selectWineryNameFromWinery();
		System.out.println("There are " + winery_name_list.size() + " winery in our database!");
		ArrayList<String> grape_name_list = dbHelper.selectGrapeNameFromGrape();
		System.out.println("There are " + grape_name_list.size() + " grape in our database!");
// WINE
		for (int i = 0; i < 100; i++) {
			String color = rdm.getRandomColor();
			Integer vintage = rdm.getRandomInteger(1996, 2019);
			String winery_name = winery_name_list.get(rdm.getRandomInteger(0, winery_name_list.size() - 1));
			String grape_name = grape_name_list.get(rdm.getRandomInteger(0, grape_name_list.size() - 1));
			dbHelper.insertIntoWine(color, vintage, winery_name, grape_name);
		}
// LIST Member, Wine
		ArrayList<Integer> MemberID= dbHelper.selectMemberIDFromMember();
		System.out.println("There are " + MemberID.size() + " member in our database!");
		ArrayList<Integer> WineID= dbHelper.selectWineIDFromWine();
		System.out.println("There are " + WineID.size() + " wine in our database!");
// REVIEW
		for (int i = 0; i < 1000; i++) {
			Integer points = rdm.getRandomInteger(1,100);
			String date_rev = rdm.getRandomInteger(2010,2019)+"-"+rdm.getRandomInteger(1,12)+"-"+rdm.getRandomInteger(1,28);
			Integer member_id = MemberID.get(rdm.getRandomInteger(0, MemberID.size() - 1));
			Integer wine_id = WineID.get(rdm.getRandomInteger(0, WineID.size() - 1));
			dbHelper.insertIntoReview(points, date_rev, member_id, wine_id);
		}
// LIST Country
		ArrayList<String> CountryName= dbHelper.selectCountryNameFromCountry();
		System.out.println("There are " + CountryName.size() + " country in our database!");
// REGION
		for (int i = 0; i < 100; i++) {
			Integer r_index = 1000+i;
			Integer m2 = rdm.getRandomInteger(5000, 800000);
			String climate = rdm.getRandomClimate();
			String country_name = CountryName.get(rdm.getRandomInteger(0, CountryName.size() - 1));
			dbHelper.insertIntoRegion(r_index, m2, climate, country_name);
		}
// AUTOCHTONS
		for (int i = 0; i < 200; i=i+2) {
			Integer tons = rdm.getRandomInteger(10000, 100000);
			Integer export_tons = rdm.getRandomInteger(5000, 80000);
			String grape_name = grape_name_list.get(i);
			String country_name = CountryName.get(rdm.getRandomInteger(0, CountryName.size() - 1));
			dbHelper.insertIntoAutochthon(tons, export_tons, grape_name, country_name);
		}
// WORLDWIDE
		for (int i = 1; i < 200; i=i+2) {
			Integer tons = rdm.getRandomInteger(10000, 100000);
			Integer export_tons = rdm.getRandomInteger(5000, 80000);
			String grape_name = grape_name_list.get(i);
			dbHelper.insertIntoWorldwide(tons, export_tons, grape_name);
		}
// FOLLOW
		for (int i = 0; i < 100; i++) {
			Integer member_id1 = MemberID.get(i);
			Integer member_id2 = MemberID.get(rdm.getRandomInteger(10, MemberID.size() - 1));
			dbHelper.insertIntoFollow(member_id1, member_id2);
		}
// WANT_TRY
		for (int i = 0; i < 100; i++) {
			Integer member_id = MemberID.get(i);
			Integer wine_id = WineID.get(rdm.getRandomInteger(0, WineID.size() - 1));
			dbHelper.insertIntoWantTry(member_id, wine_id);
		}
// LIST Region
		ArrayList<PrimaryKeyRegion> PrimaryRegion= dbHelper.selectPrimaryKeysFromRegion();
		System.out.println("There are " + PrimaryRegion.size() + " region in our database!");
// FROM
		for (int i = 0; i < 100; i++) {
			Integer wine_id = WineID.get(i);
			PrimaryKeyRegion PKR = PrimaryRegion.get(rdm.getRandomInteger(0, PrimaryRegion.size() - 1));
			dbHelper.insertIntoFrom(wine_id, PKR);
		}
// HAVE
		for (int i = 0; i < 100; i++) {
			PrimaryKeyRegion PKR = PrimaryRegion.get(rdm.getRandomInteger(0, PrimaryRegion.size() - 1));
			String grape_name = grape_name_list.get(rdm.getRandomInteger(0, grape_name_list.size() - 1));
			dbHelper.insertIntoHave(PKR, grape_name);
		}
// LIST Worldwide
		ArrayList<String> WorldwideGrape= dbHelper.selectGrapeFromWorldwide();
		System.out.println("There are " + WorldwideGrape.size() + " worldwide grape in our database!");
// GROW
		for (int i = 0; i < 100; i++) {
			String country_name = CountryName.get(rdm.getRandomInteger(0, CountryName.size() - 1));
			String grape_name = WorldwideGrape.get(i);
			dbHelper.insertIntoGrow(country_name, grape_name);
		}


		dbHelper.close();
	}

}
