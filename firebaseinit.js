const admin = require('firebase-admin');
//const serviceAccount = require('/serviceAccountKey.json');
const serviceAccount = require('C:/xampp/htdocs/pomodorest-firebase-adminsdk-dfma5-7a21dec7cc.json');
const csv = require('csv-parser');
const fs = require('fs');


admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: "https://pomodorest-default-rtdb.europe-west1.firebasedatabase.app"
});

const results = [];
fs.createReadStream('timerdb.csv')
  .pipe(csv())
  .on('data', (data) => results.push(data))
  .on('end', () => {
    console.log('CSV parsing completed successfully!');
    console.log(results);
    try {
        const db = admin.firestore();
        results.forEach((data) => {
          console.log('Adding document to Firestore:', data);
          db.collection('pomodorest').doc().set(data)
            .then(() => console.log('Document successfully written!'))
            .catch((error) => console.error('Error writing document: ', error));
        });
        console.log('Firestore import completed successfully!');
    } catch (error) {
        console.error('Firestore import failed with error:', error);
    }
  });
/*fs.createReadStream('timerdb.csv')
  .pipe(csv())
  .on('data', (data) => results.push(data))
  .on('end', () => {
    console.log(results);
    try {
        // CSV parsing code here
        // Firestore code here
        console.log('Import completed successfully!');
      } catch (error) {
        console.error('Import failed with error:', error);
      }
  });
  console.log("aaaa");
  const db = admin.firestore();
  console.log(db);
console.log("bbbb");
results.forEach((data) => {
    console.log("Adding data:", data);
    db.collection('pomodorest').doc().set(data)
      .then(() => console.log('Document successfully written!'))
      .catch((error) => console.error('Error writing document: ', error));
  });*/