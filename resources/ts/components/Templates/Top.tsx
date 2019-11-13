import React from 'react';
import { Profile } from "index";
import Card from '../Organisms/Card';

type Props = {
    profiles: Array<Profile>,
}

const Top = (props: Props) => (
    <div className="container">
        <div className="row justify-content-center">
            <div className="col-md-10">
                {props.profiles.map(profile => {
                    return (
                        <Card key={profile.id} profile={profile}/>
                    );
                })}
            </div>
        </div>
    </div>
);

export default Top;
