create table product(
    model_id int not null,
    size char not null, -- S / M / L
    available_items int,
    primary key (model_id, size),
    foreign key (model_id) references model (model_id)
);

create table model(
    model_id int auto_increment primary key,
    name text not null,
    brand text,
    price decimal(10,2),
    image_path text,
    description text
);

create table account(
    account_id int auto_increment primary key,
    name text not null,
    surname text,
    email text not null,
    password text,
    address text,
    house_number text,
    city text,
    postal_code_number int,
    state text,
    country text,
    card_number text,
    card_cvc int,
    card_owner_name text,
    card_expiry_month int,
    card_expiry_year int
); 

create table orders(
    order_id int auto_increment primary key,
    account_id int not null,
    product_id int not null,
    has_paid boolean,
    address text,
    house_number text,
    city text,
    postal_code_number int,
    state text,
    country text,
    card_number text,
    card_cvc int,
    card_owner_name text,
    card_expiry_month int,
    card_expiry_year int,
    foreign key (product_id) references product (product_id),
    foreign key (account_id) references account (account_id)
);