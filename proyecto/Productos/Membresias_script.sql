CREATE TABLE Membresias (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Servicio VARCHAR(50),
    Plan VARCHAR(50),
    Duracion VARCHAR(20),
    Precio DECIMAL(10,2)
);

-- Membresías Spotify
INSERT INTO Membresias (Servicio, Plan, Duracion, Precio) VALUES
('Spotify', 'Individual', '1 mes', 109),
('Spotify', 'Individual', '3 meses', 329),
('Spotify', 'Individual', '6 meses', 659),
('Spotify', 'Individual', '1 año', 1099),
('Spotify', 'Duo', '1 mes', 149),
('Spotify', 'Duo', '3 meses', 459),
('Spotify', 'Duo', '6 meses', 880),
('Spotify', 'Duo', '1 año', 1640),
('Spotify', 'Familiar', '1 mes', 179),
('Spotify', 'Familiar', '3 meses', 545),
('Spotify', 'Familiar', '6 meses', 1030),
('Spotify', 'Familiar', '1 año', 1950),
('Spotify', 'Estudiante', '1 mes', 70);

-- Membresías Amazon Prime
INSERT INTO Membresias (Servicio, Plan, Duracion, Precio) VALUES
('Amazon Prime', 'Amazon Prime', 'Mensual', 85),
('Amazon Prime', 'Amazon Prime', 'Anual', 859);

-- Membresías Netflix
INSERT INTO Membresias (Servicio, Plan, Duracion, Precio) VALUES
('Netflix', 'Estándar con anuncios', 'Mensual', 105),
('Netflix', 'Estándar', 'Mensual', 225),
('Netflix', 'Premium', 'Mensual', 309);
