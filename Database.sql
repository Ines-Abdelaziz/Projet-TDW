CREATE TABLE category (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description TEXT
);
CREATE TABLE season(
   id INTEGER  PRIMARY KEY AUTO_INCREMENT,
   name TEXT
);
CREATE TABLE recipe (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description TEXT,
    preparation_time INTEGER NOT NULL,
    cooking_time INTEGER NOT NULL,
    rest_time INTEGER,
    difficulty INTEGER NOT NULL,
    category_id INTEGER,
    is_healthy BOOLEAN DEFAULT FALSE,
    calories INTEGER,
    rating DECIMAL(2,1),
    season_id INTEGER,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES category(id),
    FOREIGN KEY (season_id) REFERENCES season(id)
);

CREATE TABLE RecipeMedia (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    recipe_id INTEGER NOT NULL,
    url BLOB NOT NULL,
    FOREIGN KEY (recipe_id) REFERENCES recipe(id)

);



CREATE TABLE recipe_categories (
    recipe_id INTEGER,
    category_id INTEGER,
    PRIMARY KEY (recipe_id, category_id),
    FOREIGN KEY (recipe_id) REFERENCES recipe(id),
    FOREIGN KEY (category_id) REFERENCES category(id)
);
CREATE TABLE unit(
 id INTEGER PRIMARY KEY AUTO_INCREMENT,
 name TEXT
);
CREATE TABLE ingredient (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    calories INTEGER,
    fat DECIMAL(5,2),
    protein DECIMAL(5,2),
    carbohydrates DECIMAL(5,2),
    unit_id INTEGER,
    season_id INTEGER,
    FOREIGN KEY (season_id) REFERENCES season(id),
    FOREIGN KEY (unit_id) REFERENCES unit(id)
);



CREATE TABLE recipe_ingredients (
    recipe_id INTEGER,
    ingredient_id INTEGER,
    quantity DECIMAL(5,2),
    PRIMARY KEY (recipe_id, ingredient_id),
    FOREIGN KEY (recipe_id) REFERENCES recipe(id),
    FOREIGN KEY (ingredient_id) REFERENCES ingredient(id)
    
);

CREATE TABLE recipe_step (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    recipe_id INTEGER,
    step_number INTEGER,
    instructions TEXT,
    FOREIGN KEY (recipe_id) REFERENCES recipe(id),
    FOREIGN KEY (ingredient_id) REFERENCES ingredient(id)
);
CREATE TABLE user (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL,
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    is_admin BOOLEAN DEFAULT FALSE
);
CREATE TABLE user_rating (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER,
    recipe_id INTEGER,
    rating DECIMAL(3,1),
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (recipe_id) REFERENCES recipe(id)
);

CREATE TABLE user_favorite (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER,
    recipe_id INTEGER,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (recipe_id) REFERENCES recipe(id)
);
CREATE TABLE user_recipe (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    recipe_id INTEGER ,
    user_id INTEGER ,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (recipe_id) REFERENCES recipe(id)
);
CREATE TABLE festival (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description TEXT,
    date DATE
);
CREATE TABLE festival_recipe (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    recipe_id INTEGER ,
    festival_id INTEGER ,
    FOREIGN KEY (recipe_id) REFERENCES recipe(id),
    FOREIGN KEY (festival_id) REFERENCES festival(id)
);
CREATE TABLE news (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE diaporama(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    type TEXT NOT NULL,
    recipe_id INTEGER,
    news_id INTEGER,
    FOREIGN KEY (recipe_id) REFERENCES recipe(id),
    FOREIGN KEY (news_id) REFERENCES news(id)
);