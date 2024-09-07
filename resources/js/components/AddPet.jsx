import React, { useState } from 'react';

function AddPet() {
    const [name, setName] = useState('');
    const [description, setDescription] = useState('');
    const [image, setImage] = useState('');
    const [message, setMessage] = useState(''); // For showing success/error messages

    const handleSubmit = (e) => {
        e.preventDefault();

        // Post pet data to your API endpoint
        fetch('/api/pets', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ name, description, image }),
        })
        .then(response => response.json())
        .then(data => {
            // Handle successful response
            setMessage('Pet added successfully!'); // Show success message
            setName(''); // Clear name field
            setDescription(''); // Clear description field
            setImage(''); // Clear image field
        })
        .catch((error) => {
            // Handle error
            setMessage('Error adding pet. Please try again.'); // Show error message
        });
    };

    return (
        <div>
            <h2>Add a New Pet</h2>
            {message && <p>{message}</p>} {/* Display success/error message */}
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Name:</label>
                    <input 
                        type="text" 
                        value={name} 
                        onChange={(e) => setName(e.target.value)} 
                        required 
                    />
                </div>
                <div>
                    <label>Description:</label>
                    <textarea 
                        value={description} 
                        onChange={(e) => setDescription(e.target.value)} 
                        required
                    ></textarea>
                </div>
                <div>
                    <label>Image URL:</label>
                    <input 
                        type="text" 
                        value={image} 
                        onChange={(e) => setImage(e.target.value)} 
                        required 
                    />
                </div>
                <button type="submit">Add Pet</button>
            </form>
        </div>
    );
}

export default AddPet;
