create table product(
    model_id int not null,
    size char not null, -- S / M / L
    available_items int,
    price decimal(10,2),
    primary key (model_id, size),
    foreign key (model_id) references model (model_id)
);

create table model(
    model_id int auto_increment primary key,
    name text not null,
    brand text,
    image_path text
);

create table account(
    account_id int auto_increment primary key,
    name text not null,
    surname text,
    email text not null,
    password text,
    shipping_address int,
    payment_method int,
    foreign key (shipping_address) references shipping (shipping_id),
    foreign key (payment_method) references payment (payment_id)
); 

create table shipping(
    shipping_id int auto_increment primary key,
    address text,
    house_number text,
    city text,
    postal_code_number int,
    state text,
    country text
);

create table payment(
    payment_id int auto_increment primary key,
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
    shipping_address int not null,
    payment_method int not null,
    foreign key (product_id) references product (product_id),
    foreign key (account_id) references account (account_id),
    foreign key (shipping_address) references shipping (shipping_id),
    foreign key (payment_method) references payment (payment_id)
);