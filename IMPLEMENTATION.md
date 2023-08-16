# IMPLEMENTATION
## Brett McGee

To implement my database, I utilized my step by step 
[Build Plan](https://github.com/bmcgee9/craftBeerSalesDB/blob/main/buildPlan.md). </br>
</br>
In order not to be repetitive, I will give a quick step by step guide of how I implemented my database.

If you wanted to just recreate the skeleton of my DB, you could use the `beerSchemaScript.sql` file in this repository. With this, you could reverse engineer the ERD I am using.

### Step 1: Using the data table import wizard in mySQL Workbench. 
</br>
I imported Transactions2.csv as the transactions table, beersNoCountriesToImport.csv as the products table, and vendorsToImport2.csv as the vendors table.

## When importing beersNoCountriesToImport.csv as the products table make sure to import the Size and ABV columns as TEXT instead of DOUBLES (see reasoning in issue defined in Step 2).

It is worth noting that I spent a large amount of time editing the excel sheets so that they could run smoothly. These changes included: 
- Adding the order_id column in the transactions table
- Deleting redundant columns from the transactions table
- Manually adding appropriate missing Vendor_codes in the products table
- Decomposing the products table into the products and vendors tables by taking of the Country_of_Origin column in the products table. The vendors table consists of 2 columns being the Vendor_Code and Country_of_Origin columns
- Delete duplicate rows from the new vendors table because there are a lot of them
</br>
### Step 2: Run the implementBD.sql script
</br>
This script's main function if to define the 3 primary keys and 2 foreign keys we will need to implement our database (both of which are defined in the buildPlan.md).

However, there were a few other issues that the script deals with:
- A column with the datatype text can not be created into a Primary Key or a Foreign Key. This required me to switch the datatypes of Vendor_code to varchar(255) instead of TEXT in the products and vendors tables
- A few rows of the products table which had blank cells in a column that had a data type of DOUBLE failed to import in unless the DOUBLE columns were imported with a data type of TEXT. This was causing me to be unable to add Product_code as a Foreign Key in the transactions table.

To hunt down which Product_codes were missing, I use this query using a LEFT JOIN: 
```
SELECT transactions.Product_code, products.Product_code
FROM transactions
LEFT JOIN products ON transactions.Product_code = products.Product_code
WHERE products.Product_Code IS NULL
ORDER BY transactions.Product_code ASC;
```
  
- A few (2) Product_codes that were used in the transactions table were completely missing from the products table, which was preventing me from defining Product_code as a Foreign Key in the transactions table. To fix this I deleted the 3 total rows referencing those Product_codes in the transactions table since these Product_codes were completely missing from the initial dataset. To find these problematic Product_codes, I utilized the same query as above.

