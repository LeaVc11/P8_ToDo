var classes = [
    {
        "name": "App\\Controller\\DefaultController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 5,
        "vocabulary": 5,
        "volume": 11.61,
        "difficulty": 0.5,
        "effort": 5.8,
        "level": 2,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 23.22,
        "number_operators": 1,
        "number_operands": 4,
        "number_operators_unique": 1,
        "number_operands_unique": 4,
        "cloc": 1,
        "loc": 9,
        "lloc": 8,
        "mi": 97.4,
        "mIwoC": 72.71,
        "commentWeight": 24.69,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Controller\\",
        "pageRank": 0.05,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\SecurityController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "login",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "loginCheck",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "logout",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Security\\Http\\Authentication\\AuthenticationUtils",
            "LogicException",
            "LogicException"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 3,
        "length": 22,
        "vocabulary": 15,
        "volume": 85.95,
        "difficulty": 1.46,
        "effort": 125.62,
        "level": 0.68,
        "bugs": 0.03,
        "time": 7,
        "intelligentContent": 58.81,
        "number_operators": 3,
        "number_operands": 19,
        "number_operators_unique": 2,
        "number_operands_unique": 13,
        "cloc": 9,
        "loc": 27,
        "lloc": 18,
        "mi": 97.93,
        "mIwoC": 58.94,
        "commentWeight": 38.99,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 9.33,
        "totalStructuralComplexity": 27,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 28,
        "package": "App\\Controller\\",
        "pageRank": 0.05,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\TaskController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "list",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "listEnd",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "create",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "toggleTask",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteTask",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 7,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 7,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 12,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\TaskRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\TaskRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Task",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Task",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Task",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Task",
            "App\\Repository\\TaskRepository"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 2,
        "length": 133,
        "vocabulary": 37,
        "volume": 692.86,
        "difficulty": 8.75,
        "effort": 6062.5,
        "level": 0.11,
        "bugs": 0.23,
        "time": 337,
        "intelligentContent": 79.18,
        "number_operators": 21,
        "number_operands": 112,
        "number_operators_unique": 5,
        "number_operands_unique": 32,
        "cloc": 14,
        "loc": 76,
        "lloc": 62,
        "mi": 71.05,
        "mIwoC": 40.2,
        "commentWeight": 30.85,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 400,
        "relativeDataComplexity": 0.44,
        "relativeSystemComplexity": 400.44,
        "totalStructuralComplexity": 2800,
        "totalDataComplexity": 3.1,
        "totalSystemComplexity": 2803.1,
        "package": "App\\Controller\\",
        "pageRank": 0.05,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\UserController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "list",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "create",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 5,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\PasswordHasher\\Hasher\\UserPasswordHasherInterface",
            "App\\Entity\\User",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\User",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 85,
        "vocabulary": 27,
        "volume": 404.17,
        "difficulty": 6.09,
        "effort": 2460.14,
        "level": 0.16,
        "bugs": 0.13,
        "time": 137,
        "intelligentContent": 66.4,
        "number_operators": 15,
        "number_operands": 70,
        "number_operators_unique": 4,
        "number_operands_unique": 23,
        "cloc": 4,
        "loc": 41,
        "lloc": 37,
        "mi": 70.13,
        "mIwoC": 46.87,
        "commentWeight": 23.26,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 256,
        "relativeDataComplexity": 0.43,
        "relativeSystemComplexity": 256.43,
        "totalStructuralComplexity": 768,
        "totalDataComplexity": 1.29,
        "totalSystemComplexity": 769.29,
        "package": "App\\Controller\\",
        "pageRank": 0.05,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\DataFixtures\\AppFixtures",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\FixturesBundle\\Fixture",
            "Symfony\\Component\\PasswordHasher\\Hasher\\PasswordHasherFactoryInterface",
            "Doctrine\\Persistence\\ObjectManager",
            "App\\Entity\\User",
            "App\\Entity\\User",
            "App\\Entity\\Task"
        ],
        "parents": [
            "Doctrine\\Bundle\\FixturesBundle\\Fixture"
        ],
        "implements": [],
        "lcom": 2,
        "length": 27,
        "vocabulary": 13,
        "volume": 99.91,
        "difficulty": 1,
        "effort": 99.91,
        "level": 1,
        "bugs": 0.03,
        "time": 6,
        "intelligentContent": 99.91,
        "number_operators": 3,
        "number_operands": 24,
        "number_operators_unique": 1,
        "number_operands_unique": 12,
        "cloc": 0,
        "loc": 17,
        "lloc": 17,
        "mi": 59.02,
        "mIwoC": 59.02,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 100,
        "relativeDataComplexity": 0.09,
        "relativeSystemComplexity": 100.09,
        "totalStructuralComplexity": 200,
        "totalDataComplexity": 0.18,
        "totalSystemComplexity": 200.18,
        "package": "App\\DataFixtures\\",
        "pageRank": 0.05,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Task",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getIsDone",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setIsDone",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTitle",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTitle",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getContent",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setContent",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isDone",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "toggle",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUser",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUser",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 14,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 7,
        "nbMethodsSetters": 6,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "DateTime"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 52,
        "vocabulary": 13,
        "volume": 192.42,
        "difficulty": 3.09,
        "effort": 594.76,
        "level": 0.32,
        "bugs": 0.06,
        "time": 33,
        "intelligentContent": 62.25,
        "number_operators": 18,
        "number_operands": 34,
        "number_operators_unique": 2,
        "number_operands_unique": 11,
        "cloc": 22,
        "loc": 92,
        "lloc": 70,
        "mi": 77.98,
        "mIwoC": 43.62,
        "commentWeight": 34.36,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 11.43,
        "relativeSystemComplexity": 11.43,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 160,
        "totalSystemComplexity": 160,
        "package": "App\\Entity\\",
        "pageRank": 0.34,
        "afferentCoupling": 4,
        "efferentCoupling": 1,
        "instability": 0.2,
        "violations": {}
    },
    {
        "name": "App\\Entity\\User",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUsername",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUsername",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmail",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEmail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserIdentifier",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getRoles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setRoles",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPassword",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPassword",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "eraseCredentials",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTasks",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addTask",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeTask",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 16,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 7,
        "nbMethodsSetters": 4,
        "wmc": 8,
        "ccn": 4,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Component\\Security\\Core\\User\\UserInterface",
            "Symfony\\Component\\Security\\Core\\User\\PasswordAuthenticatedUserInterface",
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\Task",
            "App\\Entity\\Task"
        ],
        "parents": [],
        "implements": [
            "Symfony\\Component\\Security\\Core\\User\\UserInterface",
            "Symfony\\Component\\Security\\Core\\User\\PasswordAuthenticatedUserInterface"
        ],
        "lcom": 2,
        "length": 76,
        "vocabulary": 18,
        "volume": 316.91,
        "difficulty": 7.29,
        "effort": 2308.95,
        "level": 0.14,
        "bugs": 0.11,
        "time": 128,
        "intelligentContent": 43.5,
        "number_operators": 25,
        "number_operands": 51,
        "number_operators_unique": 4,
        "number_operands_unique": 14,
        "cloc": 13,
        "loc": 101,
        "lloc": 88,
        "mi": 65.91,
        "mIwoC": 39.53,
        "commentWeight": 26.38,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 2.4,
        "relativeSystemComplexity": 27.4,
        "totalStructuralComplexity": 400,
        "totalDataComplexity": 38.33,
        "totalSystemComplexity": 438.33,
        "package": "App\\Entity\\",
        "pageRank": 0.13,
        "afferentCoupling": 2,
        "efferentCoupling": 5,
        "instability": 0.71,
        "violations": {}
    },
    {
        "name": "App\\Form\\TaskType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 1,
        "length": 5,
        "vocabulary": 4,
        "volume": 10,
        "difficulty": 0,
        "effort": 0,
        "level": 1.6,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 16,
        "number_operators": 0,
        "number_operands": 5,
        "number_operators_unique": 0,
        "number_operands_unique": 4,
        "cloc": 0,
        "loc": 8,
        "lloc": 8,
        "mi": 73.16,
        "mIwoC": 73.16,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 2,
        "package": "App\\Form\\",
        "pageRank": 0.05,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\UserType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "onPostSetData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 8,
        "ccn": 6,
        "ccnMethodMax": 4,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Security\\Core\\Authorization\\AuthorizationCheckerInterface",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\Form\\CallbackTransformer",
            "Symfony\\Component\\Form\\FormEvent"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 3,
        "length": 66,
        "vocabulary": 35,
        "volume": 338.53,
        "difficulty": 3.48,
        "effort": 1179.4,
        "level": 0.29,
        "bugs": 0.11,
        "time": 66,
        "intelligentContent": 97.17,
        "number_operators": 12,
        "number_operands": 54,
        "number_operators_unique": 4,
        "number_operands_unique": 31,
        "cloc": 0,
        "loc": 36,
        "lloc": 36,
        "mi": 47.53,
        "mIwoC": 47.53,
        "commentWeight": 0,
        "kanDefect": 0.5,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.53,
        "relativeSystemComplexity": 81.53,
        "totalStructuralComplexity": 243,
        "totalDataComplexity": 1.6,
        "totalSystemComplexity": 244.6,
        "package": "App\\Form\\",
        "pageRank": 0.05,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Kernel",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [
            "Symfony\\Component\\HttpKernel\\Kernel"
        ],
        "parents": [
            "Symfony\\Component\\HttpKernel\\Kernel"
        ],
        "implements": [],
        "lcom": 0,
        "length": 0,
        "vocabulary": 0,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 0,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 0,
        "number_operators_unique": 0,
        "number_operands_unique": 0,
        "cloc": 0,
        "loc": 5,
        "lloc": 5,
        "mi": 171,
        "mIwoC": 171,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "App\\",
        "pageRank": 0.05,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Repository\\TaskRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry",
            "App\\Entity\\Task"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 2,
        "length": 9,
        "vocabulary": 5,
        "volume": 20.9,
        "difficulty": 1,
        "effort": 20.9,
        "level": 1,
        "bugs": 0.01,
        "time": 1,
        "intelligentContent": 20.9,
        "number_operators": 1,
        "number_operands": 8,
        "number_operators_unique": 1,
        "number_operands_unique": 4,
        "cloc": 13,
        "loc": 28,
        "lloc": 15,
        "mi": 108.34,
        "mIwoC": 64.83,
        "commentWeight": 43.51,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Repository\\",
        "pageRank": 0.07,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "App\\Repository\\UserRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 24,
        "loc": 32,
        "lloc": 8,
        "mi": 219.69,
        "mIwoC": 171,
        "commentWeight": 48.69,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.05,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Security\\Voter\\TaskVoter",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "supports",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "voteOnAttribute",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteTask",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 3,
        "nbMethodsPrivate": 3,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 9,
        "ccn": 7,
        "ccnMethodMax": 4,
        "externals": [
            "Symfony\\Component\\Security\\Core\\Authorization\\Voter\\Voter",
            "Symfony\\Component\\Security\\Core\\Security",
            "Symfony\\Component\\Security\\Core\\Authentication\\Token\\TokenInterface",
            "Symfony\\Component\\Security\\Core\\User\\UserInterface"
        ],
        "parents": [
            "Symfony\\Component\\Security\\Core\\Authorization\\Voter\\Voter"
        ],
        "implements": [],
        "lcom": 2,
        "length": 44,
        "vocabulary": 13,
        "volume": 162.82,
        "difficulty": 7.81,
        "effort": 1272.03,
        "level": 0.13,
        "bugs": 0.05,
        "time": 71,
        "intelligentContent": 20.84,
        "number_operators": 19,
        "number_operands": 25,
        "number_operators_unique": 5,
        "number_operands_unique": 8,
        "cloc": 3,
        "loc": 38,
        "lloc": 35,
        "mi": 70.97,
        "mIwoC": 49.89,
        "commentWeight": 21.08,
        "kanDefect": 0.43,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 2.25,
        "relativeSystemComplexity": 11.25,
        "totalStructuralComplexity": 36,
        "totalDataComplexity": 9,
        "totalSystemComplexity": 45,
        "package": "App\\Security\\Voter\\",
        "pageRank": 0.05,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    }
]