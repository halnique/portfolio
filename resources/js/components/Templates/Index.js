import React from 'react';
import Card from '../Organisms/Card';

const Index = ({ profiles }) => (
    <div className="container">
        <div className="row justify-content-center">
            <div className="col-md-10">
                {profiles.map(profile => {
                    return (
                        <Card key={profile.id} profile={profile}/>
                    );
                })}
            </div>
        </div>
    </div>
);

export default Index;

