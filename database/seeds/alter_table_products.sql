ALTER TABLE products
ADD FOREIGN KEY (wording_id) REFERENCES wordings(id);