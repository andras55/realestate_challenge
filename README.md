# Developer Challenge
## API Laravel to Real Estate properties
### Route list:

#### List
Method: GET
>api/properties

Output example:
`[
    {
        "message": "List of properties"
    },
    [
        {
            "id": 1,
            "name": "House 971 Bahringer Walks",
            "real_estate_type": "house",
            "city": "Donniehaven",
            "country": "ML"
        },
        {
            "id": 2,
            "name": "Departament 657 Desiree Circle",
            "real_estate_type": "departament",
            "city": "Aftontown",
            "country": "BR"
        },
        {
            "id": 3,
            "name": "Commercial ground 54677 Bins Green",
            "real_estate_type": "commercial_ground",
            "city": "West Lora",
            "country": "ST"
        }
    ]
]`

#### Show
Method: GET
>api/properties/{property_id}

Output Example
`api/properties/30`
`{
    "id": 30,
    "name": "Departament 5900 Alec Islands",
    "real_estate_type": "departament",
    "street": "Alec Islands",
    "external_number": "5900",
    "internal_number": "18 eq",
    "neighborhood": "fugit",
    "city": "Nienowmouth",
    "country": "AX",
    "rooms": 8,
    "bathrooms": "0.5",
    "comments": "Repellat eveniet at rerum quam. Et quam et et sit. Ea quaerat magnam explicabo quidem impedit.",
    "created_at": "2022-03-04T21:06:52.000000Z",
    "updated_at": "2022-03-04T21:06:52.000000Z",
    "deleted_at": null
}`

#### Add
Method: POST
>api/properties

Input Example
`{
    "name": "Super Departament 703 Nadia Park",
    "real_estate_type": "departament",
    "street": "Nadia Park",
    "external_number": "703",
    "internal_number": "1A",
    "neighborhood": "et",
    "city": "Veracruz",
    "country": "MX",
    "rooms": 7,
    "bathrooms": "1.5",
    "comments": "Ningun comentario"
}`

Output Example
`[
    {
        "message": "Property saved successfully"
    },
    {
        "name": "Super Departament 703 Nadia Park",
        "real_estate_type": "departament",
        "street": "Nadia Park",
        "external_number": "703",
        "internal_number": "1A",
        "neighborhood": "et",
        "city": "Veracruz",
        "country": "MX",
        "rooms": 7,
        "bathrooms": "1.5",
        "comments": "Ningun comentario",
        "updated_at": "2022-03-05T18:22:57.000000Z",
        "created_at": "2022-03-05T18:22:57.000000Z",
        "id": 31
    }
]`

#### Update
Method: PUT
>api/properties/{property_id}

Input Example
`api/properties/31`
`{
    "name": "Super Land 703 Nadia Park",
    "real_estate_type": "land",
    "street": "Nadia Park",
    "external_number": "703",
    "internal_number": "",
    "neighborhood": "et",
    "city": "Veracruz",
    "country": "MX",
    "rooms": 7,
    "bathrooms": "0.5",
    "comments": "Ningun comentario"
}`

Output Example
`api/properties/31`
`[
    {
        "message": "Property updated successfully"
    },
    {
        "id": 31,
        "name": "Super Land 703 Nadia Park",
        "real_estate_type": "land",
        "street": "Nadia Park",
        "external_number": "703",
        "internal_number": null,
        "neighborhood": "et",
        "city": "Veracruz",
        "country": "MX",
        "rooms": 7,
        "bathrooms": "0.5",
        "comments": "Ningun comentario",
        "created_at": "2022-03-05T18:22:57.000000Z",
        "updated_at": "2022-03-05T18:27:50.000000Z",
        "deleted_at": null
    }
]`

#### Delete
Method: DELETE
>api/properties/{property_id}

Output Example
`api/properties/31`
`[
    {
        "message": "Property deleted successfully"
    },
    {
        "id": 31,
        "name": "Super Land 703 Nadia Park",
        "real_estate_type": "land",
        "street": "Nadia Park",
        "external_number": "703",
        "internal_number": null,
        "neighborhood": "et",
        "city": "Veracruz",
        "country": "MX",
        "rooms": 7,
        "bathrooms": "0.5",
        "comments": "Ningun comentario",
        "created_at": "2022-03-05T18:22:57.000000Z",
        "updated_at": "2022-03-05T18:33:25.000000Z",
        "deleted_at": "2022-03-05T18:33:25.000000Z"
    }
]`

## Validations
### Response examples
#### Required
`    {
        "name": [
            "The name field is required."
        ],
        "real_estate_type": [
            "The real estate type field is required."
        ],
        "street": [
            "The street field is required."
        ],
        "external_number": [
            "The external number field is required."
        ],
        "neighborhood": [
            "The neighborhood field is required."
        ],
        "city": [
            "The city field is required."
        ],
        "country": [
            "The country field is required."
        ],
        "rooms": [
            "The rooms field is required."
        ]
    }`

### Real Estate Type
`[
    {
        "real_estate_type": [
            "The selected real estate type is invalid."
        ]
    }
]`

### Bathrooms
`[
    {
        "bathrooms": [
            "The number of bathrooms only can be zero when the real estate type is land or commercial ground"
        ]
    }
]`

### Country
`[
    {
        "country": [
            "The country must be a code under ISO 3166-Alpha2"
        ]
    }
]`

### External and Internal numbers
`[
    {
        "external_number": [
            "External Number only accepts alphanumeric characters and dash."
        ],
        "internal_number": [
            "Internal Number only accepts alphanumeric characters, dash and blank spaces."
        ]
    }
]`

