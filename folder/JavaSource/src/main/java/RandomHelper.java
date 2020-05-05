
import java.io.BufferedReader;
import java.io.FileReader;
import java.util.ArrayList;
import java.util.Random;


class RandomHelper {
    private Random rand;
    private ArrayList<String> firstNames;
    private ArrayList<String> lastNames;
    private ArrayList<String> country;
    private ArrayList<String> grape;
    private ArrayList<String> food_paring;
    private ArrayList<String> acidity;
    private ArrayList<String> winery;
    private ArrayList<String> color;
    private ArrayList<String> climate;
    private static final String firstNameFile = "resources/names.csv";
    private static final String lastNameFile = "resources/surnames.csv";
    private static final String countryFile = "resources/country.csv";
    private static final String grapeFile = "resources/grape.csv";
    private static final String wineryFile = "resources/winery.csv";


    RandomHelper() {
        this.rand = new Random();
        this.lastNames = readFile(lastNameFile);
        this.firstNames = readFile(firstNameFile);
        this.country = readFile(countryFile);
        this.grape = readFile(grapeFile);
        this.food_paring = new ArrayList<String>();
          food_paring.add("Meats");
          food_paring.add("Vegetables");
          food_paring.add("Seafood");
          food_paring.add("Cheese");
          food_paring.add("Dessert");
        this.acidity = new ArrayList<String>();
          acidity.add("Medium");
          acidity.add("Low");
          acidity.add("High");
        this.winery = readFile(wineryFile);
        this.color = new ArrayList<String>();
          color.add("Red");
          color.add("White");
          color.add("Pink");
        this.climate = new ArrayList<String>();
        climate.add("Mediterranean");
        climate.add("Oceanic");
        climate.add("Continental");
    }



    //returns random element from list
    String getRandomFirstName() {
        return firstNames.get(getRandomInteger(0, firstNames.size() - 1));
    }
    String getRandomLastName() {
        return lastNames.get(getRandomInteger(0, lastNames.size() - 1));
    }
    String getRandomCountry() {
        return country.get(getRandomInteger(0, country.size() - 1));
    }
    String getRandomFoodParing() {
        return food_paring.get(getRandomInteger(0, food_paring.size() - 1));
    }
    String getRandomAcidity() {
        return acidity.get(getRandomInteger(0, acidity.size() - 1));
    }
    String getRandomColor() {return color.get(getRandomInteger(0, color.size() - 1)); }
    String getRandomClimate() {return climate.get(getRandomInteger(0, climate.size() - 1)); }

    //return element with Index from list
    String getGrape(Integer id) { return grape.get(id);}
    String getWinery(Integer id) { return winery.get(id);}
    String getCountry(Integer id) { return country.get(id);}

    //return random Integer from the Interval [min, max]; (min, max are possible as well)
    Integer getRandomInteger(int min, int max) {
        return rand.nextInt((max - min) + 1) + min;
    }

    //reads single-column files and stores its values as Strings in an ArraList
    private ArrayList<String> readFile(String filename) {
        String line;
        ArrayList<String> set = new ArrayList<String>();
        try  {
            BufferedReader br = new BufferedReader(new FileReader(filename));
            while ((line = br.readLine()) != null) {
                try {
                    set.add(line);
                } catch (Exception ignored) {
                }
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
        return set;
    }


}