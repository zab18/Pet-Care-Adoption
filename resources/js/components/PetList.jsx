import React, { useEffect, useState } from 'react';

function PetList() {
    const [pets, setPets] = useState([]);
    const [loading, setLoading] = useState(true); // Add loading state
    const [error, setError] = useState(null); // Add error state

    useEffect(() => {
        // Fetch pet data from your API endpoint
        fetch('/api/pets')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch pets'); // Handle fetch error
                }
                return response.json();
            })
            .then(data => {
                setPets(data);
                setLoading(false); // Set loading to false when data is fetched
            })
            .catch(err => {
                setError(err.message); // Set error message
                setLoading(false); // Set loading to false even if there's an error
            });
    }, []);

    if (loading) {
        return <p>Loading pets...</p>; // Show loading message while fetching data
    }

    if (error) {
        return <p>Error: {error}</p>; // Show error message if fetch fails
    }

    return (
        <div>
            <h2>Available Pets</h2>
            <div>
                {pets.length > 0 ? (
                    pets.map(pet => (
                        <div key={pet.id} style={{ border: '1px solid #ccc', padding: '1rem', margin: '1rem 0' }}>
                            <h3>{pet.name}</h3>
                            <p>{pet.description}</p>
                            {pet.image ? (
                                <img src={pet.image} alt={pet.name} style={{ width: '200px', height: 'auto' }} />
                            ) : (
                                <p>No image available</p>
                            )}
                        </div>
                    ))
                ) : (
                    <p>No pets available at the moment.</p> // Handle empty pet list
                )}
            </div>
        </div>
    );
}

export default PetList;

