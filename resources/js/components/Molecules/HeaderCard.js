import React, { Component } from 'react';
import NameHeader from '../Atoms/NameHeader';
import IconImage from '../Atoms/IconImage';

export default class HeaderCard extends Component {
    render() {
        return (
            <div className="card">
                <NameHeader name={this.props.profile.name}/>
                <IconImage iconUrl={this.props.profile.iconUrl}/>
            </div>
        );
    }
}

