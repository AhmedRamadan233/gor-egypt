# Database and CRUD Operations Setup

    
    This section describes the setup process for creating the necessary database tables and
    implementing CRUD operations for categories, products, and store prices. The steps include
    generating migrations, establishing relationships, and implementing validation.
   
### Database Setup

**`Category Table:`** Contains columns for 'id', 'name', and 'B_percentage'. Each
      category has a relation with multiple products.
      
**`Product Table:`** Contains columns for 'id', 'category_id', 'name', 'price',
      'SKU', and 'description'. Displays products associated with categories.
      
**`Store Prices Table:`** Contains columns for 'product_id', 'store_name', and
      'price'. Ensures unique combinations of 'product_id' and 'store_name'.

### Validation
    Implement validation in the request classes to ensure clean and consistent data entry. This
    includes ensuring the presence and correctness of fields such as 'category_id', 'name', 'price',
    and 'store_name'.

### CRUD Operations
**`Category Management`** Create, read, update, and delete categories.
    
**`Product Management`** Manage products within their respective categories.
    
**`Store Price Calculation`**  Select a product and store to view the calculated price.

### Additional Features
    Implement local scope functions to facilitate searching and filtering in each page. This
    improves the user experience by allowing easy access to specific entries.

