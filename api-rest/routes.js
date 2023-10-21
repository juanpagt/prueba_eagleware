const express = require('express');
const { Pool } = require('pg');

const app = express();
const port = 3000;

// Configura la conexión a la base de datos PostgreSQL
const pool = new Pool({
  user: 'juanpa',
  host: 'localhost',
  database: 'Prueba',
  password: 'Osa65761268.',
  port: 3000,
});

// Middleware para analizar JSON
app.use(express.json());

// Ruta para obtener todos los registros de una tabla
app.get('/api/registros', (req, res) => {
  pool.query('SELECT * FROM Llamadas', (error, results) => {
    if (error) {
      throw error;
    }
    res.status(200).json(results.rows);
  });
});

// Ruta para obtener un registro por ID
app.get('/api/registros/:id', (req, res) => {
  const id = req.params.id;
  pool.query('SELECT * FROM tu_tabla WHERE id = $1', [id], (error, results) => {
    if (error) {
      throw error;
    }
    res.status(200).json(results.rows);
  });
});

// Ruta para crear un nuevo registro
app.get('/api/vista', (req, res) => {
    pool.query('SELECT * FROM vista_combinada', (error, results) => {
      if (error) {
        throw error;
      }
      res.status(200).json(results.rows);
    });
  });

// Inicia el servidor
app.listen(port, () => {
  console.log(`Servidor en ejecución en el puerto ${port}`);
});
